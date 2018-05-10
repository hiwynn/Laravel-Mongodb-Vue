<template>
    <div>
        <div class="answer-item" v-if="!expand">
            <div v-html="this.content" v-bind:class="{'collapse-answer' : needCollapse}"></div>
            <button class="expand-answer-button" v-if="needCollapse" v-on:click="expandAnswer()">
                展开阅读全文 <i class="icon iconfont icon-arrowdown"></i>
            </button>
        </div>
        <div v-if="expand">
            <div v-html="this.content"></div>
            <button class="collapse-answer-button" v-on:click="collapseAnswer()">
                收起 <i class="icon iconfont icon-arrowdown"></i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props  : ['content'],
        mounted() {
            this.needCollapse = this.content.length >= 1000;
        },
        data() {
            return {
                expand      : false,
                needCollapse: this.needCollapse
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
    .answer-item {
        position: relative;
    }

    .collapse-answer {
        height: 400px;
        overflow: hidden;
    }

    .answer-item .expand-answer-button, .collapse-answer-button {
        border: none;
        background: none;
        font-size: 15px;
        cursor: pointer;
        color: rgb(23, 81, 153);
        width: 100%;
    }

    .answer-item .expand-answer-button {
        position: absolute;
        top: 320px;
        height: 80px;
        padding-top: 40px;
        background: -webkit-gradient(linear, 0 0, 0 bottom, from(rgba(255, 255, 255, 0)), to(rgba(255, 255, 255, 1)));
    }

    .expand-answer .icon-arrowdown {
        font-size: 12px;
    }
</style>