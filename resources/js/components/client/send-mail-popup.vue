<template>
<div class="modal fade" id="sendmail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-body custom_scroll p-lg-5">
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <h4>Send email to the client</h4>
                        <span class="text-danger">*It has roots in a piece of classical Latin literature from 45 BC, making</span>
                    </div>
                    <div class="col-12">
                        <label class="form-group float-label">
                            <select class="form-control show-tick ms" style="height: 58px;" data-placeholder="Select" v-on:change="getEmailTemplateContent($event)">
                                <option value="">Select Subject</option>
                                <option v-if="emailTemplateList.length > 0" v-for="template in emailTemplateList"
                                    v-text="template.content_subject" :value="template.id"></option>
                            </select>
                            <span>Choose Email Subject <code class="text-danger">*</code></span>   
                        </label>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control"
                                placeholder="Add project details"
                                style="height: 100px" v-html="emailContent"></textarea>
                            <label>Message...</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label small">Attachment</label>
                        <input class="form-control" type="file" multiple>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn m-1 btn-primary btn-animate-6" data-bs-dismiss="modal"><span class="btntext">Close</span><div class="btninfo bg-success">Click</div></div>
                        <div class="btn m-1 btn-primary btn-animate-6"><span class="btntext">Send</span><div class="btninfo bg-success">Click</div></div>
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
            emailContent: '',
            emailTemplateList: []
        }
    },
    methods:{
        getEmailTemplateList() {
            axios.get(window.url + 'get_email_template_list')
                .then(response => {
                    this.emailTemplateList = response.data;
                    // console.log(this.leadStatus);
                })
                .catch(error => { console.log(error) });
        },
        getEmailTemplateContent(event){
            if(event.target.value!=''){
                axios.post(window.url + 'get_mail_template_content', { eid: event.target.value })
                .then(response => {
                    this.emailContent = response.data.content_body;
                    console.log(this.emailContent);
                    // if (response.data.success) {
                    //     this.educationalDetailAction = 'update';
                    //     this.educationalDetails.educationalId = response.data.insID;
                    // }
                })
                .catch(errors => {
                    // $.each(errors.response.data.errors, function (key, value) {
                    //     showToastMsg('danger', 'Oops', 'Details not updated', 'Your educational information did not update');
                    //     console.log(key);
                    //     console.log(value);
                    // });
                    // console.log(errorObj);
                });
            }
        },
    },
    beforeMount() {
        this.getEmailTemplateList();
    }
}
</script>