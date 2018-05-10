<template>
    <div>
        <div class="recommend-answer" v-if="!expand">
            <span></span>
            <button class="expand-answer-button">
                阅读全文 <i class="icon iconfont icon-arrowdown"></i>
            </button>
        </div>
        <div v-if="expand">
        </div>
    </div>
</template>

<script>
    export default {
        props  : ['question'],
        mounted() {
            this.$http.get('/api/recommend/answer/' + this.question).then(response => {
                console.log(response);
            })
        },
        data() {
            return {
                expand: false
            }
        },
        methods: {
            expandAnswer() {
                this.expand = true;
            },
            collapseAnswer() {
                this.expand = false;
            }
        }
    }
</script>

<style>
    .expand-answer-button {
        background: none;
        border: none;
        font-size: 15px;
        cursor: pointer;
        color: rgb(23, 81, 153);
    }
</style>