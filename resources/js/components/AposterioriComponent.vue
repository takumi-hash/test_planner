<template>
    <div class="">
        <barchart-component :chartData="chartData" :options="options"></barchart-component>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="control_cv">統制群CTR</label>
                    <div v-model="control_ctr">{{ control_ctr }}</div>
                </div>
                <div class="form-group">
                    <label for="control_cv">統制群のCV数</label>
                    <input type="number" v-model="control_cv" class="form-control" step="1" min="0">
                </div>
                <div class="form-group">
                    <label for="control_imp">統制群のサンプルサイズ</label>
                    <input type="number" v-model="control_imp" class="form-control" step="1" min="0">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="control_cv">実験群CTR</label>
                    <div v-model="control_ctr">{{ experimental_ctr }}</div>
                </div>
                <div class="form-group">
                    <label for="experimental_cv">実験群のCV数</label>
                    <input type="number" v-model="experimental_cv" class="form-control" step="1" min="0">
                </div>
                <div class="form-group">
                    <label for="experimental_imp">実験群のサンプルサイズ</label>
                    <input type="number" v-model="experimental_imp" class="form-control" step="1" min="0">
                </div>
            </div>
        </div>
        <input @click="calculateAposteriori(control_imp, experimental_imp,control_cv, experimental_cv)" class="btn btn-primary btn-block" type="submit" value="Calculate">
        <div>
          ▼
        </div>
        <div>
        p-value: {{ p_value }}.{{ message_p }}
        </div>
        <div>
        power: {{ power }}.{{ message_power }}
        </div>
    </div>
</template>

<script>
    import BarchartComponent from './BarchartComponent.vue';
    export default {
        name: 'BarChart2',
        components: {
            BarchartComponent
        },
        data() {
            return{
                control_imp: 6000,
                control_cv: 1230,
                control_ctr: "",
                experimental_imp: 8000,
                experimental_cv: 1100,
                experimental_ctr: "",
                p_value: "",
                message_p: "",
                power: "",
                message_power: "",
                message: "",
                chartData: {
                    labels: ['Control', 'Experiment'],
                    datasets: [
                        {
                            label: 'sample1',
                            data:[0.1, 0.15]
                        }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                          scaleLabel: {
                            display: true,
                            //label: '想定CTR'
                          }
                        }],
                        yAxes: [{
                          ticks: {
                            beginAtZero: true,
                            stepSize: 0.1
                          }
                        }]
                    }
                }
            };
        },
        created: function() {
            //
        },
        methods: {
            calculateAposteriori(){
                axios
                    .post("/api/aposteriori",{
                        control_imp: this.control_imp,
                        control_cv: this.control_cv,
                        experimental_imp: this.experimental_imp,
                        experimental_cv: this.experimental_cv,
                    })
                    .then(response => {
                        this.p_value = response.data.res.p_value;
                        this.message_p = response.data.res.message_p;
                        this.power = response.data.res.power;
                        this.message_power = response.data.res.message_power;
                        this.control_ctr = (this.control_cv/this.control_imp);
                        this.experimental_ctr = (this.experimental_cv/this.experimental_imp);
                        this.chartData = {
                            labels: ["Group A", "Group B"],
                            datasets: [
                                {
                                    label: "CTR",
                                    backgroundColor: "#3fc462",
                                    data: [(this.control_cv/this.control_imp), (this.experimental_cv/this.experimental_imp)]
                                }
                            ]
                        };
                    })
                    .catch(err => {
                        this.message = err;
                    });
            }
        },
        mounted() {
            this.control_ctr = (this.control_cv/this.control_imp);
            this.experimental_ctr = (this.experimental_cv/this.experimental_imp);
            this.chartData = {
                labels: ["Group A", "Group B"],
                datasets: [
                    {
                        label: "CTR",
                        backgroundColor: "#f87979",
                        data: [(this.control_cv/this.control_imp), (this.experimental_cv/this.experimental_imp)]
                    }
                ]
            };
        }
    };
</script>
