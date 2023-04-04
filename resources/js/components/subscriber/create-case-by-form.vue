
<template>
    <div class="modal fade" id="CreateCaseByForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-header">
                    <h5 class="modal-title h4">Case Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom_scroll p-lg-4 pt-lg-1">
                    <div class="row g-2 mt-3">
                        <div class="col-6 form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Name" v-model="caseData.first_name">
                            <label>Name <span class="text-danger">*</span></label>
                            <span class="text-danger" v-if="this.caseDataError.first_name">Name is required</span>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <select class="form-control form-control-lg custom-select" v-model="caseData.marital_status">
                                <option> Choose </option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <option value="3">Married With Kids</option>
                                <option value="4">Seperated</option>
                            </select>
                            <label>Marital Status</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <input type="text" class="form-control" placeholder="email@example.com" v-model="caseData.email_id">
                            <label>Email</label>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Mobile Number" v-model="caseData.mobile_number">
                            <label>Mobile Number <span class="text-danger">*</span></label>
                            <span class="text-danger" v-if="this.caseDataError.mobile_number">Mobile number is required</span>
                        </div>
                        <div class="col-6 form-floating mb-3">
                            <select class="form-control form-control-lg custom-select" v-model="caseData.highest_qualification">
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
                            <select class="form-control form-control-lg custom-select" v-model="caseData.work_experience">
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
                            <select class="form-control form-control-lg custom-select" v-model="caseData.visa_type">
                                <option> Applying For </option>
                                <option value="1">Business Investor Visa</option>
                                <option value="2">Tourist Visa</option>  
                                <option value="3">Canada PR</option>
                                <option value="4">Study Visa</option>
                                <option value="7">Australia PR</option>
                                <option value="8">Investor Visa</option>
                            </select>
                            <label>Visa <span class="text-danger">*</span></label>
                            <span class="text-danger" v-if="this.caseDataError.visa_type">Visa type is required</span>
                        </div> 
                        <div class="col-6 form-floating mb-3">
                            <input type="date" class="form-control" placeholder="Date of Birth" v-model="caseData.date_of_birth">
                            <label>Date of Birth</label>
                        </div>                        

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn m-1 btn-primary btn-animate-6" v-on:click="submitManually()"><span class="btntext">Save</span>
                                <div class="btninfo bg-success">Click</div>
                            </button>
                        </div>
                        
                        <div class="alert alert-warning text-center mt-3" v-if="response" v-text="response"></div>
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
            response: '',
            caseData: {
                first_name: '',
                email_id: '',
                mobile_number: '',
                marital_status: '',
                date_of_birth: '',
                highest_qualification: '',
                work_experience: '',
                visa_type: '',
                source:'manual by form',
            },
            caseDataError: {
                first_name: false,
                mobile_number: false,
                visa_type: false,
            },
        }
    },
    methods:{
        submitManually() {
            // this.caseDataError.first_name = this.caseData.first_name==''?true:false; 
            this.caseDataError.mobile_number = this.caseData.mobile_number==''?true:false; 
            this.caseDataError.visa_type = this.caseData.visa_type==''?true:false;

            if(!this.caseDataError.mobile_number&&!this.caseDataError.visa_type){
                axios.post(window.url + 'upload_case_manually', {data: this.caseData}).then((res) => {
                    this.response = res.data;
                    // console.log(res.data);
                }) .catch(error => { console.log(error) });
            }
        }
    },
    beforeMount() {
        

    }
}
</script>

