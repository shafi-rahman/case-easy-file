
<template>
    <div class="modal fade" id="UploadCasesByExcel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content text-start">
                <div class="modal-header">
                    <h5 class="modal-title h4">Upload Case By Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom_scroll p-lg-4">
                    <div class="mb-4">
                        
                        <p class="text-muted">Please make the excel you are going to upload, data format must be same as <a href="/uploads/demo_excel_format.csv">Demo Excel Format</a></p>
                    </div>
                    <!-- <input type="file" class="dropify"> -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select an excel file</label>
                            <input class="form-control" type="file" id="formFile" v-on:change="uploadFile($event)">
                        </div>
                        <button v-on:click="submitFile($event)" class="btn btn-primary text-uppercase w-100 mt-3 btn-animate-6"><span class="btntext">Proceed to Upload</span>
                            <div class="btninfo bg-success">Click</div>
                        </button>
                        <div class="alert alert-warning text-center mt-3" v-if="response" v-text="response"></div>
                        <a class="btn btn-success text-uppercase w-100 mt-3 btn-animate-6" v-if="response" v-on:click="refresh_list">Refresh the list</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
            uploadexcel: null,
            response:'',
        }
    },
    methods:{
        uploadFile(e) {
            this.uploadexcel = e.target.files[0];
            console.log(this.uploadexcel);
        },
        submitFile() {

            console.log(this.uploadexcel);
            const formData = new FormData();
            formData.append('file', this.uploadexcel);
            const headers = { 'Content-Type': 'multipart/form-data' };
            axios.post(window.url + 'upload_case_excel_file', formData, { headers }).then((res) => {
                this.response = res.data;
                // console.log(res.data); // binary representation of the file
                // console.log(res.status); // HTTP status
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

