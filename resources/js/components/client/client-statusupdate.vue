<template>
    <div class="modal fade" id="updatestatus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title">Case Status Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-5">
                <div class="row g-2">
                    <div class="col-md-12 col-12">
                        <div class="form-floating">
                            <div class="col-12">
                                <label class="form-group float-label">
                                    <select class="form-control show-tick ms" v-model="caseStatusDetail.status" style="height: 58px;" data-placeholder="Select">
                                        <option value="">Select Status</option>
                                        <option v-if="leadStatus.length > 0" v-for="lstatus in leadStatus"
                                            v-text="lstatus.name" :value="lstatus.id"></option>
                                    </select>
                                    <span>Choose Status <code class="text-danger">*</code></span>
                                </label>
                                <label class="text-danger" v-if="caseStatusError.status">This field is required</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Notes" v-model="caseStatusDetail.notes" style="height: 100px"></textarea>
                            <label>Notes...</label>
                            <span class="text-danger" v-if="caseStatusError.notes">This field is required</span>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="form-label">Schedule follow-up</label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" v-model="caseStatusDetail.followup_date">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Time</label>
                        <input class="form-control" type="time" v-model="caseStatusDetail.followup_time">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn m-1 btn-primary btn-animate-6" v-on:click="update_case_status_details()"><span class="btntext">Update Status</span><div class="btninfo bg-success">Click</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
if(window.userDetails!=undefined){
    var userDetails = JSON.parse(window.userDetails.replace(/&quot;/g,'"'));
}
export default {
    props: ['currentstatus'],
    data() {
        return {
            leadStatus: [],
            caseStatusDetail:{
                user_id: '',
                case_id: userDetails.id,
                status: userDetails.status,
                notes: '',
                followup_date: '',
                followup_time: '',
            },
            caseStatusError:{
                status: false,
                notes: false,
            },
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
        update_case_status_details() { console.log(this.currentstatus);
            this.caseStatusError.status = this.caseStatusDetail.status==''?true:false;
            this.caseStatusError.notes = this.caseStatusDetail.notes==''?true:false;

            if (!this.caseStatusError.notes && !this.caseStatusError.status) {

                axios.post(window.url + 'update_case_status_details/', this.caseStatusDetail)
                    .then(response => {
                        console.log(response.data);
                        if (response.data.success) {
                            // $('#updatestatus').modal('hide');
                            showToastMsg('success', 'Greate', 'Details updated', 'Case status successfully updated');
                            window.location.reload();
                        }
                    })
                    .catch(errors => {
                        showToastMsg('danger', 'Oops', 'Details not updated', 'Case status information did not update');
                            
                        // $.each(errors.response.data.errors, function (key, value) {
                        //     console.log(key);
                        //     console.log(value);
                        // });
                        // console.log(errorObj);
                    });

            }
        },
    },
    beforeMount() {
        this.getLeadStatus();

    }
}
</script>