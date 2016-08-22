new Vue({
    el: '#timeline',
    data: {
        post: '',
        posts: [],
        limit: 2,
        total: 0
    },

    methods: {
        postStatus: function (e) {
            e.preventDefault();
            console.log(this.post);
            $.ajax({
                url: '/posts',
                type: 'post',
                dataType: 'json',
                data: {
                    'body': this.post
                }
            }).success(function (data) {
                this.post = '';
                this.posts.unshift(data);
            }.bind(this)).error(function (){
                //para un futuro cuando quiera implementar el caso de que un post falle
            })
                ;
        },
        getPosts: function () {
            $.ajax({
                url: '/posts',
                dataType: 'json',
                type: 'get',
                data: {
                    limit: this.limit
                }
            }).success(function (data) {
                this.posts = data.posts;
                this.total = data.total;
            }.bind(this));
        },
        getMorePosts: function (e) {
            e.preventDefault();

            this.limit = this.limit + this.limit;
            this.getPosts();
        }
    },
    ready: function () {
        this.getPosts();

        setInterval(function () {
            this.getPosts();
        }.bind(this), 10000);
    }

});

$("#loginBtn").click(function(){
    $("#signInBox").slideDown(400);
    $("#loginBtn").slideUp(400);
    $("#registerBtn").slideUp(400);


});
$("#emailInput").keyup(checkOpacity);

$("#passInput").keyup(checkOpacity);
function checkOpacity()
{
    var chars = $( "#emailInput" ).val().length + $( "#passInput" ).val().length;
    if (chars) 
    {
        $( "#signInBox" ).fadeTo( "slow" , 1)
        console.log('unfade');
    }
    else
    {
        $( "#signInBox" ).stop();
        $( "#signInBox" ).fadeTo( "slow" , 0.5)
        console.log('fade');
    }
};
// var form = $('#signInForm').on('lost', function() {
//       $( "#signInBox" ).fadeTo( "slow" , 0.5, function() {
//     // Animation complete.
//   });
// });

// $('#email, #password, #loginbtn').on({
//   focus: function() {
//         form.data('blurred', false);
//         $( "#signInBox" ).fadeTo( "slow" , 1, function() {
//         // Animation complete.
//       });
//   },
//   blur: function() {
//     form.data('blurred', true);
    
//         setTimeout(function() {
//         if ( form.data('blurred') ) {
//         form.trigger('lost');
//       }
//     },200)
//   }
// });

