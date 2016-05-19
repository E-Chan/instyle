new Vue({
    el:  '#timeline',
    data: {
        post: '',
    },
    methods: {
        postStatus : function (e) {
            e.preventDefault();
            console.log(this.post);
        }
    }
});