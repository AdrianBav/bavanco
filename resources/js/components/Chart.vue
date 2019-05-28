<template>
    <div>
        <div ref="chart" style="width:100%; height:400px;"></div>
    </div>
</template>

<script>
    import Highcharts from "highcharts";
    import loadDrillDown from "highcharts/modules/drilldown";

    export default {

        props: [
            "options",
        ],

        mounted() {
            loadDrillDown( Highcharts );

            Highcharts.chart( this.$refs[ "chart" ], this.options );
        },

    };
</script>
