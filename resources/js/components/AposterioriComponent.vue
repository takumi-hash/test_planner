<template>
    <div class="">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="control_imp">統制群のサンプルサイズ</label>
                    <input type="number" v-model="control_imp" class="form-control" tep="1" min="0">
                </div>
                <div class="form-group">
                    <label for="experimental_imp">実験群のサンプルサイズ</label>
                    <input type="number" v-model="experimental_imp" class="form-control" tep="1" min="0">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="control_cv">統制群のCV数</label>
                    <input type="number" v-model="control_cv" class="form-control" tep="1" min="0">
                </div>
                <div class="form-group">
                    <label for="experimental_cv">実験群のCV数</label>
                    <input type="number" v-model="experimental_cv" class="form-control" tep="1" min="0">
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
    export default {
        data() {
            return{
                control_imp: 6000,
                control_cv: 1230,
                experimental_imp: 8000,
                experimental_cv: 1100,
                p_value: "",
                message_p: "",
                power: "",
                message_power: "",
                message: ""
            };
        },
        created: function() {
            //
        },
        methods: {
            calculateAposteriori(){
                axios
                    .post("/api/aposteriori/",{
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
