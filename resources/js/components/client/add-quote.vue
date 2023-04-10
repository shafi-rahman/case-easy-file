<template>
    <div class="modal fade" id="addquote" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Payment Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-5 pt-lg-4">
                <div class="row g-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-primary" v-model="quoteData.quote_amount" placeholder="Quote Amount">
                                <label>Quote Amount</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-primary" v-model="quoteData.discount" placeholder="Discount Amount">
                                <label>Discount Amount</label>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="form-floating">
                                <input type="text" class="form-control text-primary" v-model="quoteData.notes" placeholder="Notes">
                                <label>Notes</label>
                            </div>
                        </div>
                        <div class="col-6 pt-3 mt-3">
                            <label>Payment Mode:&nbsp;&nbsp;</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="full">Full</label>
                                <input class="form-check-input" type="radio" id="full" v-model="quoteData.payment_type" value="1" checked>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="instalment">Instalment</label>
                                <input class="form-check-input" type="radio" id="instalment" v-model="quoteData.payment_type" value="2">
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
                                    <input type="number" class="form-control text-primary" v-model="quoteData.amount[0]" required placeholder="Amount">
                                    <label>Token Amount</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control text-primary" v-model="quoteData.due_date[0]" placeholder="Amount">
                                    <label>Due Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control text-primary" v-model="quoteData.amount[1]" required placeholder="Amount">
                                    <label>First Installment</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control text-primary" v-model="quoteData.due_date[1]" placeholder="Amount">
                                    <label>Due Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control text-primary" v-model="quoteData.amount[2]" required placeholder="Amount">
                                    <label>Second Installment</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control text-primary" v-model="quoteData.due_date[2]" placeholder="Amount">
                                    <label>Due Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control text-primary" v-model="quoteData.amount[3]" required placeholder="Amount">
                                    <label>Third Installment</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control text-primary" v-model="quoteData.due_date[3]" placeholder="Amount">
                                    <label>Due Date</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn mx-2 px-4 py-2 btn-primary btn-animate-4" v-on:click="add_more_payment()"><span>Add More</span></button>
                    </div> -->

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn m-1 btn-danger btn-animate-6" data-bs-dismiss="modal"><span class="btntext">Close</span><div class="btninfo bg-success">Click</div></div>
                        <div class="btn m-1 btn-success btn-animate-6" v-on:click="save_case_quote()"><span class="btntext">Save</span><div class="btninfo bg-success">Click</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
var userDetails = JSON.parse(window.userDetails .replace(/&quot;/g,'"'));
var case_id = userDetails.id;
export default {
    data() {
        return {
            instl_count: 0,
            leadStatus: [],
            quoteData:{
                case_id: case_id,
                quote_amount: '',
                notes: '',
                discount: '',
                payment_type: '',
                amount: [],
                due_date: [],
            }
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
            
            let i = this.instl_count++;
            
            console.log(i);

            let payRow = `<div class="row p-0 mt-2"><div class="col-6"><div class="form-floating">
            <input type="text" class="form-control text-primary" :name="due_date[${i}]" v-model="quoteData.due_date[${i}]" placeholder="Amount">
            <label>Amount</label></div></div><div class="col-6"><div class="form-floating">
            <input type="date" class="form-control text-primary" v-model="quoteData.due_date[${i}]" placeholder="Due Date">
            <label>Date</label></div></div></div>`;
            
            $('.payment-schedule').append(payRow);
        },
        save_case_quote(){ console.log(this.quoteData);
            axios.post(window.url + 'save_case_quote/', this.quoteData)
                .then(response => {
                    console.log(response);
                    // if (response.data.length != 0) {
                    //     this.personalDetailsError.email_id = true;
                    //     $('.email_validation').text('Email already in used');
                    // }
                })
                .catch(errors => { console.log(errors); });
        }
    },
    beforeMount() {
        this.getLeadStatus();

    }
}
</script>

