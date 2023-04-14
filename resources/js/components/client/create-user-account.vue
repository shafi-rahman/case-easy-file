<template>
    <div class="modal fade" id="createuseraccount" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Create User Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-5 pt-lg-4">
                <div class="row g-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-primary" value="" placeholder="Quote Amount">
                                <label>Quote Amount</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-primary" value="" placeholder="Discount Amount">
                                <label>Discount Amount</label>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control text-primary" value="" placeholder="Notes">
                                <label>Notes</label>
                            </div>
                        </div>
                        <div class="col-6 pt-3 mt-3">
                            <label>Payment Mode:&nbsp;&nbsp;</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="payment_mode" type="radio" id="full" value="full" checked>
                                <label class="form-check-label" for="full">Full</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="payment_mode" type="radio" id="instalment" value="instalment">
                                <label class="form-check-label" for="instalment">Instalment</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4 pt-3" style="border-top: 1px solid #cacaca;">
                        <label class="form-label">Schedule payment</label>
                    </div>

                    <div class="row payment-schedule">
                        <div class="row p-0">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control text-primary" value="" placeholder="Amount">
                                    <label>Amount</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control text-primary" value="" placeholder="Amount">
                                    <label>Date</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" v-on:click="add_more_payment()"><span>Add More</span></button>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn m-1 btn-danger btn-animate-6" data-bs-dismiss="modal"><span class="btntext">Close</span><div class="btninfo bg-success">Click</div></div>
                        <div class="btn m-1 btn-success btn-animate-6"><span class="btntext">Save</span><div class="btninfo bg-success">Click</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            leadStatus: []
        }
    },
    methods:{
        getLeadStatus() {
            axios.get(window.url + 'get_lead_status')
                .then(response => {
                    this.leadStatus = response.data;
                    // console.log(this.leadStatus);
                })
                .catch(error => { console.log(error) });
        },
        add_more_payment(){
            let payRow = '<div class="row p-0 mt-2"><div class="col-6"><div class="form-floating">';
            payRow += '<input type="text" class="form-control text-primary" value="" placeholder="Amount">';
            payRow += '<label>Amount</label></div></div><div class="col-6"><div class="form-floating">';
            payRow += '<input type="date" class="form-control text-primary" value="" placeholder="Amount">';
            payRow += '<label>Date</label></div></div></div>';
            
            $('.payment-schedule').append(payRow);
        }
    },
    beforeMount() {
        this.getLeadStatus();

    }
}
</script>

