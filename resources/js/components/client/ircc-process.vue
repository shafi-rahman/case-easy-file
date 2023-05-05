<template>
<div class="col-6 float-start">
    <div class="card fieldset border border-primary">
        <span class="fieldset-tile text-primary bg-body">IRCC process update:</span>
        <div class="col-md-12 col-12" v-if="!this.userGenerateForm||this.userGenerateFormToIRCC.length==0">
            <div class="form-floating">
                <input type="text" class="form-control" v-model="application_no" required>
                <label>Application Number <code class="text-danger">*</code></label>
            </div>
        </div>
        <div class="col-md-12 col-12" v-if="!this.userGenerateForm||this.userGenerateFormToIRCC.length==0">
            <div class="form-floating">
                <input type="text" class="form-control" v-model="uci_no" required>
                <label>UCI Number <code class="text-danger">*</code></label>
            </div>
        </div>
        <div class="col-md-12 col-12" v-if="!this.userGenerateForm||this.userGenerateFormToIRCC.length==0">
            <div class="form-floating">
                <input type="text" class="form-control" v-model="application_type" required>
                <label>Application Type <code class="text-danger">*</code></label>
            </div>
        </div>
        <div class="col-md-12 col-12" v-if="!this.userGenerateForm||this.userGenerateFormToIRCC.length==0">
            <div class="form-floating">
                <input type="date" class="form-control" v-model="submit_date_to_ircc" required>
                <label>Submit Date to IRCC <code class="text-danger">*</code></label>
            </div>
        </div>

        <div class="col-md-12 col-12">
            <div class="form-floating">
                <input type="text" class="form-control" v-model="ircc_file_status" required>
                <label>IRCC File Status <code class="text-danger">*</code></label>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <div class="form-floating">
                <input type="text" class="form-control" v-model="ircc_status_notes" required>
                <label>IRCC File Status Notes <code class="text-danger">*</code></label>
            </div>
        </div>
        <div class="col-md-12 col-12 mt-3" v-if="this.application_no">
            <div class="form-check form-check-inline">
                <label class="form-check-label">Application Outcome: </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="application_outcome" v-model="application_outcome" id="granted" :value="1">
                <label class="form-check-label" for="granted">Granted</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="application_outcome" v-model="application_outcome" id="refused" :value="2">
                <label class="form-check-label" for="refused">Refused</label>
            </div>
        </div>
        <input type="hidden" name="case_id" value=""/>
        <div class="d-grid mt-4 gap-2 d-md-flex justify-content-md-end personal_details_btn_main">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="view_status" v-model="view_status">
                <label class="form-check-label" for="view_status">Check here, if you do not want to show this status to the client.</label>
            </div>
            <button type="submit" value="submit" v-on:click="set_ircc_process_status()" class="btn m-1 btn-lg btn-primary btn-animate-6">
                <span class="btntext">Save</span>
                <div class="btninfo bg-success">Click</div>
            </button>
        </div>
    </div>
</div>
<div class="col-5 float-end" v-if="this.application_no">
    <div class="card fieldset border border-primary">
        <span class="fieldset-tile text-primary bg-body">IRCC Application Details:</span>

        <div class="custom_scroll">
            <h4 class="modal-title">{{this.application_no??''}}</h4>
            <p class="text-muted">Application submitted to IRCC &nbsp;<i class="fa fa-clock-o"></i> {{this.submit_date_to_ircc}}</p>
            <div class="card bg-body p-md-4 p-2 mb-2">
                <p class="mb-1">Application Number: <span class="fw-bold">{{ this.application_no }}</span></p>
                <p class="mb-0">Application Type: <span class="fw-bold">{{ this.application_type }}</span></p>
                <p class="mb-0">UCI Number: <span class="fw-bold">{{ this.uci_no }}</span></p>
            </div>
            <ul class="timeline-activity list-unstyled mb-0">
                
                <li class="activity px-3 py-2 mb-1" v-for="responseIrcc in this.userGenerateFormToIRCC">
                    <span class="act_date">{{ new Date(responseIrcc.created_at).toLocaleString("en", { year: "numeric", month: "short", day: "numeric"}) }}</span>
                    <div class="fw-bold small d-flex justify-content-between align-items-center">
                        {{ responseIrcc.ircc_file_status }}<span v-if="responseIrcc.view_status==0" class="badge bg-warning">Client can not see</span>
                    </div>
                    <div>
                        <small class="text-muted">{{ responseIrcc.ircc_status_notes }}</small>
                    </div>
                </li>

            </ul>
        </div>


    </div>
</div>
</template>
<script>
import { captureRejectionSymbol } from 'events';

if(window.userDetails!=undefined){
    var userDetails = JSON.parse(window.userDetails.replace(/&quot;/g,'"'));
    var case_id = userDetails.id;
    var visa_id = userDetails.visa_id;
    var managed_by = userDetails.managed_by;
    // console.log(visa_id+" : "+case_id); 
}
export default {
    data() {
        return {
            formData:{
                case_id: case_id,
                visa_id: visa_id
            },
            userGenerateForm: '',
            userGenerateFormToIRCC: '',
            generate_form_id: '',
            ircc_file_status: '',
            ircc_status_by: managed_by,
            ircc_status_notes: '',
            application_type: '',
            application_outcome: '',
            view_status: '1',
            uci_no: '',
            application_no: '',
            submit_date_to_ircc: '',
        }
    },
    methods:{
        getIRCCprocess() {
            // console.log(this.formData);
            axios.post(window.url + 'get_ircc_process', this.formData)
                .then(response => {
                    console.log(response.data);
                    this.userGenerateForm = response.data.ircc_process_data.userGenerateForm;
                    if(this.userGenerateForm!=''){
                        this.generate_form_id = this.userGenerateForm.id; 
                        this.userGenerateFormToIRCC = response.data.ircc_process_data.userGenerateFormToIRCC;
                        
                        if(this.userGenerateFormToIRCC!=''){ console.log(this.userGenerateFormToIRCC[0].generate_form_id);
                            this.application_no = this.userGenerateFormToIRCC[0].application_no;
                            this.uci_no = this.userGenerateFormToIRCC[0].uci_no;
                            this.application_type = this.userGenerateFormToIRCC[0].application_type;
                            this.submit_date_to_ircc = this.userGenerateFormToIRCC[0].submit_date_to_ircc;
                        }
                    }
                    // console.log(this.userGenerateForm); 
                    // console.log('----------------'); 
                    // console.log(this.userGenerateFormToIRCC.length); 
                })
                .catch(error => { console.log(error) });
        },
        set_ircc_process_status(){
            var fdata = {
                generate_form_id:this.generate_form_id, 
                ircc_file_status:this.ircc_file_status, 
                ircc_status_by:this.ircc_status_by, 
                ircc_status_notes:this.ircc_status_notes,
                application_type:this.application_type, 
                uci_no:this.uci_no, 
                application_no:this.application_no,
                view_status:this.view_status,
                application_outcome:this.application_outcome,
                submit_date_to_ircc:this.submit_date_to_ircc
            };

            console.log(fdata);

            axios.post(window.url + 'set_ircc_process_status', fdata)
                .then(response => {
                    console.log(response.data);
                    if(response.data.success){
                        window.location.reload();
                    }
                })
                .catch(errors => { console.log(errors); });
               
        }
    },
    beforeMount() {
        this.getIRCCprocess();

    }
}
</script>

