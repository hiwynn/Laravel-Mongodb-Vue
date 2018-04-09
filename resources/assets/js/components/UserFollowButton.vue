<template>
    <button
            class="btn"
            v-bind:class="{'btn-success' : followed, 'btn-default': !followed}"
            v-text="text"
            v-on:click="follow"
    ></button>
</template>

<script>
    export default {
        props   : ['user'],
        mounted() {
            this.$http.get('/api/user/followers/' + this.user).then(response => {
          console.log(response.data);
                this.followed = response.data.followed
            })
        },
        data() {
            return {
                followed: false
            }
        },
        computed: {
            text() {
//          console.log(this);
                return this.followed ? '已关注' : '关注他'
            }
        },
        methods : {
            follow() {
                this.$http.post('/api/user/follow', {'user': this.user}).then(response => {
                    console.log(response.data);
                    this.followed = response.data.followed
                })
            }
        }
    }
</script>