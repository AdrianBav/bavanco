<template>
    <div>
        <canvas ref="chart" width="400" height="400"></canvas>
    </div>
</template>

<script>
    import Chart from 'chart.js';

    export default {

        props: [
            "type",
            "data",
        ],

        mounted() {
            let chart = new Chart(this.$refs[ "chart" ], {
                type: this.type,
                data: this.data,
                options: {
                    responsive: false,
                },
            });
        },

    };
</script>
