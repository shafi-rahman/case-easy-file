
<template>
    <div class="modal fade" id="CreateCaseByForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-body custom_scroll p-lg-5">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h4 class="modal-title">Case Details</h4>
                    <div class="row g-2 mt-3">
                        <div class="col-6 form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Name">
                            <label>Name</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <select class="form-control form-control-lg custom-select">
                                <option> Choose </option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <option value="3">Married With Kids</option>
                                <option value="4">Seperated</option>
                            </select>
                            <label>Marital Status</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <input type="text" class="form-control" placeholder="email@example.com">
                            <label>Email</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Mobile Number">
                            <label>Mobile Number</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <select class="form-control form-control-lg custom-select">
                                <option> Choose Highest </option>
                                <option value="php">PHD</option>
                                <option value="master">Master's</option>
                                <option value="bachelor">Bachelor's</option>
                                <option value="senior_secondary">Senior Secondary(12th Class)</option>
                                <option value="secondary">Secondary(10th Class)</option>  
                            </select>
                            <label>Qualification</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <select class="form-control form-control-lg custom-select">
                                <option> Choose an option </option>
                                <option value="0">Fresher</option>
                                <option value="1">1 year</option>
                                <option value="2">2 year</option>  
                                <option value="3">3 year</option>
                                <option value="4">4 year</option>
                                <option value="5">5 year</option>
                                <option value="6">6 year</option>
                                <option value="7">7 year</option>
                                <option value="8">8 year</option>
                                <option value="9">9 year</option>
                                <option value="10">10 year</option>
                            </select>
                            <label>Work Experience</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <select class="form-control form-control-lg custom-select">
                                <option> Applying For </option>
                                <option value="1">Business Investor Visa</option>
                                <option value="2">Tourist Visa</option>  
                                <option value="3">Canada PR</option>
                                <option value="4">Study Visa</option>
                                <option value="7">Australia PR</option>
                                <option value="8">Investor Visa</option>
                            </select>
                            <label>Visa</label>
                        </div> 
                        <div class="col-6 form-floating mb-3">
                            <input type="date" class="form-control" placeholder="Date of Birth">
                            <label>Date of Birth</label>
                        </div>                        

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Save</span>
                                <div class="btninfo bg-success">Click</div>
                            </button>
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
            caseData: {
                first_name: '',
                email_id: '',
                mobile_number: '',
                marital_status: '',
                date_of_birth: '',
                first_name: '',
                first_name: '',
                first_name: '',
                first_name: '',
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

