new Vue({
    el:'#timeline',
    methods: {
        postStatus : function (e) {
            e.preventDefault();
            console.log('posted');
        }
    }
});