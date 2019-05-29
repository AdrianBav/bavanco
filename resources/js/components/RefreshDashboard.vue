<template>
    <div class="card">
        <div class="card-body">

            <p>There are {{ newIps }} new IPs and {{ newAgents }} new Agents...</p>

            <div v-if="loading" class="mb-4">
                Refreshing...
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>

            <button type="button" :disabled="preventRefresh" @click="refresh()">Refresh Dashboard Statistics</button>

        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {

        props: [
            "newIpCount",
            "newAgentCount",
        ],

        data() {
            return {
                loading: false,
                newIps: 0,
                newAgents: 0,
            };
        },

        computed: {
            preventRefresh: function () {
                return ( this.noNewData || this.loading );
            },

            noNewData: function () {
                return ( this.newIps == 0 && this.newAgents == 0 );
            },
        },

        mounted() {
            this.newIps = this.newIpCount;
            this.newAgents = this.newAgentCount;
        },

        methods: {
            refresh() {
                this.loading = true;

                axios.post( "/dashboard/refresh" )
                    .then( response => {
                        //
                    })
                    .catch( error => {
                        console.error( error.response.data );
                    })
                    .finally( () => {
                        this.loading = false;

                        location.reload();
                    });
            },
        },

    };
</script>
