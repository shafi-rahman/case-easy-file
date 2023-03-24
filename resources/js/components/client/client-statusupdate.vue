<template>
    <div class="modal fade" id="updatestatus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-body custom_scroll p-lg-5">
                <div class="row g-2">
                    <div class="col-12">
                        <h4>Update Status</h4>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-floating">
                            <div class="col-12">
                                <label class="form-group float-label">
                                    <select class="form-control show-tick ms" style="height: 58px;" data-placeholder="Select">
                                        <option value="">Select Status</option>
                                        <option v-if="leadStatus.length > 0" v-for="lstatus in leadStatus"
                                            v-text="lstatus.name" :value="lstatus.id"></option>
                                    </select>
                                    <span>Choose Status <code class="text-danger">*</code></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Notes" style="height: 100px"></textarea>
                            <label>Notes...</label>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="form-label">Schedule follow-up</label>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Time</label>
                        <input class="form-control" type="time">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="btn m-1 btn-primary btn-animate-6" data-bs-dismiss="modal"><span class="btntext">Close</span><div class="btninfo bg-success">Click</div></div>
                            <div class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Update Status</span><div class="btninfo bg-success">Click</div></div>
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
    },
    beforeMount() {
        this.getLeadStatus();

    }
}
</script>