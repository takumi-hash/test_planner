<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        <div v-if="updateForm">
                            <p>統制群の見込みCTR：<input type="number" v-model="control_ctr" step="0.01"/></p>
                            <p>実験群の見込みCTR：<input type="number" v-model="experimental_ctr" step="0.01"/></p>
                            <p>有意水準：<input type="number" v-model="p_value" step="0.01"/></p>
                            <button @click="calculateApriori(control_ctr, experimental_ctr, p_value)">
                                Go
                            </button>
                        </div>
                        <div class="">
                          Result goes here.
                          <ol>
                            <li>p-value: {{ p_value }}</li>
                            <li>Power: {{ power }}</li>
                            <li>res array: {{ res }}</li>
                          </ol>
                        </div>
                    </div>
                    <!-- エラーメッセージ -->
                    <p v-if="message">{{ message }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                message: "",
                updateForm: true,
                control_ctr: 0.1,
                experimental_ctr: 0.15,
                p_value: 0.05,
                power: 0.8,
                res: 0
            };
        },
        created: function() {
            //
        },
        methods: {
            calculateApriori(){
                axios
                    .post("/api/apriori/",{
                        control_ctr: this.control_ctr,
                        experimental_ctr: this.experimental_ctr,
                        p_value: this.p_value,
                        power: this.power
                    })
                    .then(response => {
                        this.res = response.data.res.result_n;
                        this.message = "Responded";
                    })
                    .catch(err => {
                        this.message = err;
                    });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    };
</script>
