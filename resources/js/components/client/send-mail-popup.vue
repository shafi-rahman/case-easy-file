<template>
<div class="modal fade" id="sendmail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Send email to the client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom_scroll p-lg-4">
                <div class="row g-2">
                    <div class="col-12">
                        <label class="form-group float-label">
                            <select class="form-control show-tick ms" id="mail_subject" style="height: 58px;" data-placeholder="Select" v-on:change="getEmailTemplateContent($event)">
                                <option value="">Select Subject</option>
                                <option v-if="emailTemplateList.length > 0" v-for="template in emailTemplateList"
                                    v-text="template.content_subject" :value="template.id"></option>
                            </select>
                            <span>Choose Email Subject <code class="text-danger">*</code></span>   
                        </label>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="mail_cc">
                            <label>Cc</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <div class="summernote"></div>
                        </div>
                    </div>
                    <div class="col-12" id="attachmentDiv">
                        <label class="form-label small">Attachment</label>
                        <input class="form-control" type="file" id="attachment"  v-on:change="uploadFile($event)">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="btn m-1 btn-primary btn-animate-6" v-on:click="send_mail()"><span class="btntext">Send</span><div class="btninfo bg-success">Click</div></div>
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
    var case_id = userDetails.id;
    var emailid = userDetails.email_id;
    var managed_by = userDetails.managed_by;
    var actionFrom = userDetails.actionFrom;
    console.log(actionFrom);
}

export default {
    data() {
        return {
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
                    if(response.data.content_body!=''){
                        $('.summernote').summernote('reset');
                        $('.summernote').summernote('editor.pasteHTML', response.data.content_body);
                    }
                    if (response.data.success) {
                        this.educationalDetailAction = 'update';
                        this.educationalDetails.educationalId = response.data.insID;
                    }
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
        uploadFile(e) {
            this.uploadexcel = e.target.files[0];
            // console.log(this.uploadexcel);
        },
        send_mail(){
            // var sub = $('#mail_subject').find(":selected").text();
            // var mailcc = $('#mail_cc').val();
            // var content = $('.summernote').summernote('code'); 
            // var mailid = $('#emailid').val();
            // var attach = $('a#attachment').attr('href');

            // axios.post(window.url + 'send_mail', { sub: sub, mailcc:mailcc, content: content, 
                // mailid: mailid, attach: attach, case_id:case_id, managed_by:managed_by })
            //     .then(response => {
            //         // console.log(response.data);
            //         if (response.data.success) {
            //             window.location.reload();
            //         }
            //     })
            //     .catch(errors => {
            //         console.log(errors);
            //     });

            // console.log(this.uploadexcel);
            showLoader();
            // var attach = $('a#attachment').attr('href')!=''?$('a#attachment').attr('href'):'';
            var attach = $('a#attachment').attr('href');
            const formData = new FormData();
            formData.append('sub',  $('#mail_subject').find(":selected").text());
            formData.append('mailcc', $('#mail_cc').val());
            formData.append('content', $('.summernote').summernote('code'));
            formData.append('mailid', emailid);
            formData.append('file', (this.uploadexcel!=undefined?this.uploadexcel: attach));
            formData.append('case_id', case_id);
            formData.append('managed_by', managed_by);
            formData.append('actionFrom', actionFrom);

            console.log(formData);

            const headers = { 'Content-Type': 'multipart/form-data' };
            axios.post(window.url + 'send_mail', formData, { headers }).then((res) => {
                this.response = res.data;
                console.log(res.data); 
                
                hideLoader();
                showToastMsg('success', 'Greate', 'Sent notification', 'Successfully sent the notification.');
                            
                // console.log(res.status); // HTTP status
            });

        },
    },
    beforeMount() {
        this.getEmailTemplateList();
    }
}


</script>