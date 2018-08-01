 $(document).ready(function() {
        // Initializes search overlay plugin.
        // Replace onSearchSubmit() and onKeyEnter() with 
        // your logic to perform a search and display results
        $('[data-pages="search"]').search({
            searchField: '#overlay-search',
            closeButton: '.overlay-close',
            suggestions: '#overlay-suggestions',
            brand: '.brand',
            onSearchSubmit: function(searchString) {
                console.log("Search for: " + searchString);
            },
            onKeyEnter: function(searchString) {
                console.log("Live search for: " + searchString);
                var searchField = $('#overlay-search');
                var searchResults = $('.search-results');
                clearTimeout($.data(this, 'timer'));
                searchResults.fadeOut("fast");
                var wait = setTimeout(function() {
                    searchResults.find('.result-name').each(function() {
                        if (searchField.val().length != 0) {
                            $(this).html(searchField.val());
                            searchResults.fadeIn("fast");
                        }
                    });
                }, 500);
                $(this).data('timer', wait);
            }
        });
    });
/*
|-------------------------------------------------------------------------
| Funtion to typehead
|-------------------------------------------------------------------------
*/
(function($) {

    'use strict';

    var getBaseURL = function() {
        var url = document.URL;
        return url.substr(0, url.lastIndexOf('/'));
    }

    $(document).ready(function() {

        //Typehead Sample Code

        // Basic Sample using Bloodhound
        // constructs the suggestion engine

        var bestPictures = new Bloodhound({
            datumTokenizer: function (d) {
              return Bloodhound.tokenizers.whitespace(d.value);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,

            remote: {
              url: base + 'store/get_list',
              prepare: function (query, settings) {
                settings.url = settings.url + '?q=' + query

                return settings;
              }
            }
        });

        //Custom Template
        $('#custom-lokasi-tempat .typeahead').typeahead(null, {
              name: 'code-location',
              display: 'code',
              source: bestPictures,
              templates: {
                empty: [
                  '<div class="tt-dataset tt-dataset-countries">',
                    '<div class="tt-suggestion tt-selectable">Tidak dapat menemukan data</div>',
                  '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div class="tt-suggestion tt-selectable">{{code}} – {{name}}</div>')
              }
        });

        var data_supplier = new Bloodhound({
            datumTokenizer: function (d) {
              return Bloodhound.tokenizers.whitespace(d.value);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,

            remote: {
              url: base + 'supplier/get_list',
              prepare: function (query, settings) {
                settings.url = settings.url + '?q=' + query

                return settings;
              }
            }
        });

        //Custom Template
        $('#custom-supplier .typeahead').typeahead(null, {
              name: 'code-location',
              display: 'code',
              source: data_supplier,
              templates: {
                empty: [
                  '<div class="tt-dataset tt-dataset-countries">',
                    '<div class="tt-suggestion tt-selectable">Tidak dapat menemukan data</div>',
                  '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div class="tt-suggestion tt-selectable">{{code}} – {{name}}</div>')
              }
        });

        var data_kategori = new Bloodhound({
            datumTokenizer: function (d) {

              return Bloodhound.tokenizers.whitespace(d.value);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,

            remote: {
              url: base + 'category_product/get_list',
              prepare: function (query, settings) {
                settings.url = settings.url + '?q=' + query

                return settings;
              }
            }
        });

        $('#custom-kategori .typeahead').on('typeahead:selected', function(evt, item) {
              var kategori = item.code;
              kategori = kategori.substring(0, 2);
              var fullDate = new Date();
              var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : (fullDate.getMonth() + 1);

              if (twoDigitMonth < 10) twoDigitMonth = "0" + twoDigitMonth;
              var twoDigitDate = fullDate.getDate() + "";
              if (twoDigitDate < 10) twoDigitDate = "0" + twoDigitDate;
              var twoDigitYear = (fullDate.getFullYear() + "").substring(4, 3);
              var currentDate = twoDigitYear + "" + twoDigitMonth + "" + twoDigitDate;
              var barcode = area_code + kategori + currentDate;

                $.ajax
                ({
                  type: "GET",
                  url: base+"product/get_barcode?category=" + barcode,
                  success: function(data)
                  {
                     $('#field-barecode').val(barcode + "" + data);
                  }
                });
        });

        //Custom Template
        $('#custom-kategori .typeahead').typeahead(null, {
              name: 'code-location',
              display: 'code',
              source: data_kategori,
              templates: {
                empty: [
                  '<div class="tt-dataset tt-dataset-countries">',
                    '<div class="tt-suggestion tt-selectable">Tidak dapat menemukan data</div>',
                  '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div class="tt-suggestion tt-selectable">{{code}} – {{name}}</div>')
              }
        });


        var data_product = new Bloodhound({
            datumTokenizer: function (d) {

              return Bloodhound.tokenizers.whitespace(d.value);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,

            remote: {
              url: base + 'product/get_list',
              prepare: function (query, settings) {
                settings.url = settings.url + '?q=' + query

                return settings;
              }
            }
        });

        $('#custom-product .typeahead').on('typeahead:selected', function(evt, item) {
              var barcode = item.code;

                $.ajax
                ({
                  type: "GET",
                  url: base+"product/get_by_barcode?barcode=" + barcode,
                  success: function(data)
                  {
                     $("#data-cart").html('');
                     $("#data-cart").append(data);
                  }
                });
        });

        //Custom Template
        $('#custom-product .typeahead').typeahead(null, {
              name: 'code-location',
              display: 'code',
              source: data_product,
              templates: {
                empty: [
                  '<div class="tt-dataset tt-dataset-countries">',
                    '<div class="tt-suggestion tt-selectable">Tidak dapat menemukan data</div>',
                  '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div class="tt-suggestion tt-selectable">{{code}} – {{name}}</div>')
              }
        });


        $('#custom-product-order-toko .typeahead').on('typeahead:selected', function(evt, item) {
              var barcode = item.code;

                $.ajax
                ({
                  type: "GET",
                  url: base+"logisout_order_toko/get_by_barcode?barcode=" + barcode,
                  success: function(data)
                  {
                     $("#data-cart").html('');
                     $("#data-cart").append(data);
                  }
                });
        });

        //Custom Template
        $('#custom-product-order-toko .typeahead').typeahead(null, {
              name: 'code-location',
              display: 'code',
              source: data_product,
              templates: {
                empty: [
                  '<div class="tt-dataset tt-dataset-countries">',
                    '<div class="tt-suggestion tt-selectable">Tidak dapat menemukan data</div>',
                  '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div class="tt-suggestion tt-selectable">{{code}} – {{name}}</div>')
              }
        });



    });

})(window.jQuery);

/*
|-------------------------------------------------------------------------
| Funtion to datatable
|-------------------------------------------------------------------------
*/
(function($) {

    'use strict';

    // Initialize a basic dataTable with row selection option
    var initBasicTable = function() {

        var table = $('#basicTable');

        var settings = {
            "sDom": "t",
            "destroy": true,
            "paging": false,
            "scrollCollapse": true,
            "order": [
                [0, "desc"]
            ]

        };

        table.dataTable(settings);

    }

    initBasicTable();

})(window.jQuery);

/*
|-------------------------------------------------------------------------
| Funtion to validation form
|-------------------------------------------------------------------------
*/
(function($) {

    'use strict';

    $(document).ready(function() {

      $('#form-employee').validate();
      $('#form-store').validate();
      $('#form-supplier').validate();
      
    });

})(window.jQuery);




/*
|-------------------------------------------------------------------------
| Funtion to trigger the refresh event
|-------------------------------------------------------------------------
*/
bootChat();

/*----------------------------------------------------------------------------------------------------
| Function to load messages
-------------------------------------------------------------------------------------------------------*/
function bootChat()
{
    refresh = setInterval(function()
    {
 
    $.ajax(
        {
            type: 'GET',
            url : base + "chat/updates/",
            async : true,
            cache : false,
            success: function(data){
                if(data.success){
                     thread = data.messages;
                     senders = data.senders;
                     $.each(thread, function() {
                        if($("#chat-box").is(":visible")){
                            chatbuddy = $("#chat_buddy_id").val();
                                if(this.sender == chatbuddy){
                                  li = '<li class="'+ this.type +'"><img src="assets/images/thumbs/'+this.avatar+'" class="avt img-responsive">\
                                    <div class="message">\
                                    <span class="chat-arrow"></span>\
                                    <a href="javascript:void(0)" class="chat-name">'+this.name+'</a>&nbsp;\
                                    <span class="chat-datetime">at '+this.time+'</span>\
                                    <span class="chat-body">'+this.body+'</span></div></li>';
                                    $('ul.chat-box-body').append(li);
                                    $('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
                                    //Mark this message as read
                                $.ajax({ type: "POST", url: base + "chat/mark_read", data: {id: this.msg}});
                                }
                                else{
                                    from = this.sender;
                                    $.each(senders, function() {
                                        if(this.user == from){
                                            $(".chat-group").find('span[rel="'+from+'"]').text(this.count);
                                        }
                                    });
                                }
                         }
                         else{
                            from = this.sender;
                            $.each(senders, function() {
                                if(this.user == from){
                                    $(".chat-group").find('span[rel="'+from+'"]').text(this.count);
                                }
                            });
                            
                         }
                     });

                    // var audio = new Audio('assets/notify/notify.mp3').play();
                }
            },
                error : function(XMLHttpRequest, textstatus, error) { 
                            console.log(error); 
                }
        }
    );

       }, 2000);
}
/*----------------------------------------------------------------------
| Function to display individual chatbox di modul chat
------------------------------------------------------------------------*/

$(document).on('click', '[data-toggle="popover"]', function(){
        $(this).popover('hide');
        $('ul.chat-box-body').empty();
        user = $(this).find('input[name="user_id"]').val();
        $(this).find('span[rel="'+user+'"]').text('');

        load_thread(user);

        var offset = $(this).offset(); 
        var h_main = $('#chat-container').height();
        var h_title = $("#chat-box > .chat-box-header").height();
        var top = ($('#chat-box').is(':visible') ? (offset.top - h_title - 40) : (offset.top + h_title - 20));
        if((top + $('#chat-box').height()) > h_main){ top = h_main -  $('#chat-box').height();}
        $('#chat-box').css({'top': top});
        if(!$('#chat-box').is(':visible')){
            $('#chat-box').toggle('slide',{
                direction: 'right'
            }, 500);
        }
        $('.chat-box-body').slimScroll({ height: '300px' });
        // FOCUS INPUT TExT WHEN CLICK
        $("#chat-box .chat-textarea input").focus();
});

/*----------------------------------------------------------------------
| Function to send message
------------------------------------------------------------------------*/
$(document).on('keypress', '.chat-textarea input', function(e){
        var txtarea = $(this);
        var message = txtarea.val();
        if(message !== "" && e.which == 13){
            txtarea.val('');
            // save the message 
            $.ajax({ type: "POST", url: base  + "chat/save_message", data: {message: message, user : user},cache: false,
                success: function(response){
                    msg = response.message;
                    li = '<li class=" bubble '+ msg.type +'"><img src="assets/images/thumbs/'+msg.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <span class="chat-arrow"></span>\
                    <a href="javascript:void(0)" class="chat-name">'+msg.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+msg.time+'</span>\
                    <span class="chat-body">'+msg.body+'</span></div></li>';

                    $('ul.chat-box-body').append(li);

                    $('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
                }
            });
        }
});

/* ============================================================
 * Pages Chat
 * ============================================================ */
var user = '';

(function($) {
  'use strict';
  //To Open Chat When Clicked
  $('[data-chat-input]').on('keypress',function(e){
    if(e.which == 13) {
       var el = $(this).attr('data-chat-conversation');
       var txtarea = $(this);
       var message = txtarea.val();
       txtarea.val('');
       // save the message 
            $.ajax({ type: "POST", url: base  + "chat/save_message", data: {message: message, user : user},cache: false,
                success: function(response){
                    $(el).append('<div class="message clearfix">'+
                    '<div class="chat-bubble from-me">'+message+
                    '</div></div>');
             }
            });
    }
  });

  $('[data-view-port="#chat"]').on('click',function(e){
        user = $(this).find('input[name="user_id"]').val();
        $(this).find('span[rel="'+user+'"]').text('');

        load_thread(user);
    });

})(window.jQuery);

/*----------------------------------------------------------------------
| Function to load threaded messages or user conversation
------------------------------------------------------------------------*/
var limit = 1;
function load_thread(user, limit){
        //send an ajax request to get the user conversation 
       $.ajax({ type: "POST", url: base  + "chat/messages", data: {user : user, limit:limit },cache: false,
        success: function(response){
        if(response.success){
            buddy = response.buddy;
            status = buddy.status == 1 ? 'Online' : 'Offline';
            statusClass = buddy.status == 1 ? 'user-status is-online' : 'user-status is-offline';

            $("#user_selected").html(buddy.name);
            $("#user_status").html(status);
            $("#my-conversation").html('');

            if(buddy.more){
                $('#chat-more').html('');
                // $('#chat-more').append('<div id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_thread(\''+buddy.id+'\', \''+buddy.limit+'\')" class="btn btn-xs btn-info" style="width:100%">View older messsages('+buddy.remaining+')</a></div>');
                $('#chat-more').append('<div id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_thread(\''+buddy.id+'\', \''+buddy.limit+'\')" class="inline action p-r-10 pull-right link text-master"><i class="pg-more"></i></a></div>');
            }

            thread = response.thread;
                $.each(thread, function() {
                    li = '';

                    if(this.name != "You"){
                        li = '<div class="message clearfix">\
                                  <div class="profile-img-wrapper m-t-5 inline">\
                                    <img width="34" height="34" data-src-retina="'+base+'assets/img/profiles/'+this.avatar+'" data-src="'+base+'assets/img/profiles/'+this.avatar+'" alt="" src="'+base+'assets/img/profiles/'+this.avatar+'" class="col-top">\
                                  </div>\
                                  <div class="chat-bubble from-them">\
                                    '+this.body+'\
                                    <br>\
                                    <small>at '+this.time+'</small>\
                                  </div>\
                                </div>';
                    }else{
                        li = '<div class="message clearfix">\
                                  <div class="chat-bubble from-me">\
                                    '+this.body+'\
                                    <br>\
                                    <small>at '+this.time+'</small>\
                                  </div>\
                                </div>';
                    }

                    $('#my-conversation').append(li);
            });


            // untuk view di modul chat
            $('#chat_buddy_id').val(buddy.id);
            $('.display-name', '#chat-box').html(buddy.name);
            $('#chat-box > .chat-box-header > small').html(status);
            $('#chat-box > .chat-box-header > span.user-status').removeClass().addClass(statusClass);

            $('ul.chat-box-body').html('');
            if(buddy.more){
             $('ul.chat-box-body').append('<li id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_thread(\''+buddy.id+'\', \''+buddy.limit+'\')" class="btn btn-xs btn-info" style="width:100%">View older messsages('+buddy.remaining+')</a></li>');
            }
 

                thread = response.thread;
                $.each(thread, function() {
                  li = '<li class="'+ this.type +'"><img src="assets/images/thumbs/'+this.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <span class="chat-arrow"></span>\
                    <a href="javascript:void(0)" class="chat-name">'+this.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+this.time+'</span>\
                    <span class="chat-body">'+this.body+'</span></div></li>';

                    $('ul.chat-box-body').append(li);
                });
                if(buddy.scroll){
                    $('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
                }
                
            }
        }});
}



/*----------------------------------------------------------------------
| Function to note
------------------------------------------------------------------------*/
var noteid = '';
var newnote = true;
$(document).on('click', '.list > ul > li', function(e) {
    newnote = false;
    noteid = $(this).find('.note-id').val();
});

$(".new-note-link").click(function(e) {
    newnote = true;
});

$(".close-note-link").click(function(e) {
    var valuenote = $(".quick-note-editor").html();
    var uri = (newnote) ? base+"note/proses" : base+"note/proses/" + noteid;
    $.ajax({
        url : uri,
        type: "POST",
        data: {valuenote: valuenote, id: noteid},
        success: function(data)
        {
            //alert("success" + data);
            $("#note-list-item").load(base+"note/get_data");
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
});

$("#note-list-item").load(base+"note/get_data");

$(".btn-remove-notes").click(function(e) {
    e.preventDefault();
    $.ajax({
        url : base+"note/delete",
        type: "POST",
        data: $("#quick-note-list").serialize(),
        success: function(data)
        {
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
    return false;
});