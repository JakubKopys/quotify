
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

// setup to prevent crsf token exceptions
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$(document).ready(function () {
    var $toggleCategories = $('a.toggle-categories');
    $('a.toggle-categories').click(function (e) {
        e.preventDefault();

        $('.categories ul').slideToggle(200, function () {
            if ($(this).is(":visible")) {
                $toggleCategories.html('Categories <i class="fa fa-caret-up" aria-hidden="true"></i>');
            } else {
                $toggleCategories.html('Categories <i class="fa fa-caret-down" aria-hidden="true"></i>');
            }
        });
    })
});

// ajax like, delegation is not necessary there but lol why not
$(document).delegate('.like-form', 'submit', function(e) {
    e.preventDefault();
    var $form = $(this);
    var $quote_id = $form.data('quote-id');
    console.log("/quotes/"+$quote_id+"/likes");
    $.ajax({
        type: "POST",
        url: "/quotes/"+$quote_id+"/likes",
        dataType: 'JSON',
        success: function (data) {
            console.log("Ajax like success");
            console.log(data['view']);
            $('.likes[data-quote-id='+$quote_id+']').html(data['view']);

            // figure out why generated view has wrong likes count
            // for now I will manually increase the counter
            // var new_count = parseInt(data['count']) + 1;
            // $('.like-link[data-'+$model+'-id='+$model_id+']').html("Unlike <span class='glyphicon glyphicon-thumbs-down'></span> ("+new_count+")");
        },
        error: function (data) {
            console.log("Ajax like error");
            console.log(data);
        }
    });
});

$(document).delegate('.unlike-form', 'submit', function(e) {
    e.preventDefault();
    var $form = $(this);
    var $quote_id = $form.data('quote-id');
    $.ajax({
        type: "DELETE",
        url: "/quotes/"+$quote_id+"/likes",
        dataType: 'JSON',
        success: function (data) {
            console.log("Ajax unlike success");
            console.log(data['view']);
            $('.likes[data-quote-id='+$quote_id+']').html(data['view']);

            // TODO: figure out why generated view has wrong likes count
            // for now I will manually decrease the counter
            // var new_count = parseInt(data['count']) - 1;
            // $('.like-link[data-'+$model+'-id='+$model_id+']').html("Like <span class='glyphicon glyphicon-thumbs-up'></span> ("+new_count+")");
        },
        error: function (data) {
            console.log("Ajax like error");
            console.log(data);
        }
    });
});