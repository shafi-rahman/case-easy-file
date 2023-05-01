
<template>
    <div class="modal fade" id="uploadCorrectedForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-header">
                    <h5 class="modal-title h4">Upload Corrected Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom_scroll p-lg-4">
                    <div class="mb-4">
                        
                        <p class="text-muted">Please make sure all the changes required you have fulfilled properly</p>
                    </div>
                    <!-- <input type="file" class="dropify"> -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select Corrected file</label>
                            <input class="form-control" type="file" id="formFile" v-on:change="uploadFile($event)">
                        </div>
                        <button v-on:click="submitFile($event)" class="btn btn-primary text-uppercase w-100 mt-3 btn-animate-6"><span class="btntext">Proceed to Upload</span>
                            <div class="btninfo bg-success">Click</div>
                        </button>
                        <div class="alert alert-warning text-center mt-3" v-if="response" v-text="response"></div>
                        <a class="btn btn-success text-uppercase w-100 mt-3 btn-animate-6" v-if="response" v-on:click="refresh_list">Refresh the information</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
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
            response:'',
            case_id: case_id,
            visa_id: visa_id,
            managed_by: managed_by,
        }
    },
    methods:{
        uploadFile(e) {
            this.uploadexcel = e.target.files[0];
            // console.log(this.uploadexcel);
        },
        submitFile() {
            // console.log(this.uploadexcel);
            const formData = new FormData();
            formData.append('file', this.uploadexcel);
            formData.append('case_id', this.case_id);
            formData.append('visa_id', this.visa_id);
            formData.append('managed_by', this.managed_by);
            const headers = { 'Content-Type': 'multipart/form-data' };
            axios.post(window.url + 'upload_case_corrected_form', formData, { headers }).then((res) => {
                console.log(res.data);
                if(res.data.success){
                    this.response = "Successfully uploaded";
                    // console.log(res.data); // binary representation of the file
                    // console.log(res.status); // HTTP status
                }
            });
        },
        refresh_list(){
            window.location.reload();
        } 
    },
    beforeMount() {
        

    }
}


</script>

