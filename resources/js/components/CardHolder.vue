<template>
    <div class="card-holder" @contextmenu.prevent="removeNextCard()">

        <div v-if="bottomVisible" class="bottom-card-tilt">
            <slot name="bottom-card"></slot>
        </div>

        <div v-if="middleVisible" class="middle-card-tilt">
            <slot name="middle-card"></slot>
        </div>

        <div v-if="topVisible">
            <slot></slot>
        </div>

    </div>
</template>

<style>
    .bottom-card-tilt {
        transform: rotate(-3deg);
    }
    .middle-card-tilt {
        transform: rotate(1deg);
    }
</style>

<script>
    export default {

        data() {
            return {
                topVisible: true,
                middleVisible: true,
                bottomVisible: true,
            };
        },

        methods: {
            removeNextCard() {
                if ( this.topVisible ) {
                    this.topVisible = false;
                    return;
                }

                if ( this.middleVisible ) {
                    this.middleVisible = false;
                    return;
                }

                if ( this.bottomVisible ) {
                    this.bottomVisible = false;
                }
            },
        },

    };
</script>
