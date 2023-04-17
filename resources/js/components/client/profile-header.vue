<template>
    <ul class="nav nav-tabs tab-card border-bottom-0 p-0 fs-6 justify-content-center justify-content-md-start" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#personal_details" role="tab">
                <i class="fa fa-address-card-o"></i>
                <span class="d-none d-sm-inline-block ms-2">Personal Details</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#educational_details" role="tab">
                <i class="fa fa-graduation-cap"></i>
                <span class="d-none d-sm-inline-block ms-2">Educational Details</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#professional_details" role="tab" id="tab_profile_campaigns">
                <i class="fa fa-bookmark-o"></i>
                <span class="d-none d-md-inline-block ms-2">Professional Details</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#document_details" role="tab">
                <i class="fa fa-folder"></i><span class="d-none d-md-inline-block ms-2">Document Details</span>
            </a>
        </li> -->
    </ul>
</template>
<script>
export default {
    data() {
        return {
            users: []
        }
    },
    created() {
        // TODO ajax request to fetch users
    }
}
</script>