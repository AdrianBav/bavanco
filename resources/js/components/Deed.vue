<template>
    <a class="item" @click="toggle()">

        <div>
            <slot name="front"></slot>
        </div>

        <transition name="fade">
            <div v-if="mortgaged" class="mortgaged">
                <slot name="back"></slot>
            </div>
        </transition>

    </a>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>

<script>
    export default {

        data() {
            return {
                mortgaged: false,
            };
        },

        methods: {
            toggle() {
                this.mortgaged = ( ! this.mortgaged );
            },
        },

    };
</script>
