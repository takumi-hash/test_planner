<template>
    <div class="">
        <div class="form-group">
            <label for="control_ctr">統制群の見込みCTR</label>
            <input type="number" v-model="control_ctr" step="0.01" min="0.0" max="1.0">
        </div>
        <div class="form-group">
            <label for="experimental_ctr">実験群の見込みCTR</label>
            <input type="number" v-model="experimental_ctr" step="0.01" min="0.0" max="1.0">
        </div>
        <div class="form-group">
            <label for="experimental_ctr">有意水準</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" v-model="p_value" id="radios1" disabled="" name="p_value" type="radio" value="0.001">
                <label for="radios1" class="form-check-label">0.001</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" v-model="p_value" id="radios2" disabled="" name="p_value" type="radio" value="0.01">
                <label for="radios2" class="form-check-label">0.01</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" v-model="p_value" id="radios3" disabled="" name="p_value" type="radio" value="0.05">
                <label for="radios3" class="form-check-label">0.05</label>
            </div>
        </div>
        <div class="form-group">
            <label for="power">検定力：「本当は差がないのに差がある」と判断することへの許容度</label>
            <input class="form-control" id="power_input" step="0.1" min="0.0" max="1.0" name="power" type="number" value="0.8" readonly="">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" id="modifyCheck" onclick="changeReadOnly()" name="agree" type="checkbox" value="1">
                <label for="modifyCheck" class="form-check-label">結果に与える影響を理解しているので有意水準と検定力を変更する。</label>
            </div>
        </div>
        <input @click="calculateApriori(control_ctr, experimental_ctr, p_value)" class="btn btn-primary btn-block" type="submit" value="Calculate">
        <div>
          ▼
        </div>
        <div>
        1群あたり必要なサンプルサイズは{{ res }}人。
        </div>
        <!-- エラーメッセージ -->
        <!-- <p v-if="message">{{ message }}</p> -->
    </div>
</template>

<script>
    export default {
        data() {
            return{
                message: "",
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
                    .post("/api/apriori",{
                        control_ctr: this.control_ctr,
                        experimental_ctr: this.experimental_ctr,
                        p_value: this.p_value,
                        power: this.power
                    })
                    .then(response => {
                        this.res = Math.round(response.data.res.result_n);
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
