<template>
    <main>
        <div class="container">

            <div class="row">

                <div class="modal" tabindex="-1" id="thx">
                    
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                        <div class="modal-header">
                            <h5 class="modal-title w-100">Thanks for contacting us 🎉</h5>
                        </div>
                        <div class="modal-body">
                            <p>We will contact you as soon as possible</p>
                        </div>
                        <div class="modal-footer px-2">
                            <button class="btn btn-primary" data-dismiss="modal" @click="reset">Close</button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h1 class="text-center text-uppercase">Contact Form</h1>
                    <form  @submit.prevent="addUser">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" :disabled="inputBlock" class="form-control" id="name" v-model="name" required maxlength="50" :class="{'is-invalid':errors.name}" >

                            <p v-for="(error, index) in errors.name" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" :disabled="inputBlock" class="form-control" id="surname" v-model="surname" required maxlength="50" :class="{'is-invalid':errors.surname}" >
                            <p v-for="(error, index) in errors.surname" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" :disabled="inputBlock" class="form-control" id="email" v-model="email" required maxlength="100" :class="{'is-invalid':errors.email}" >
                            <p v-for="(error, index) in errors.email" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <button :disabled='formSending' type="submit" class="btn btn-primary">{{ (formSending)? 'Sending ...' : 'Submit'}}</button>
                    </form>
                </div>

            </div>

        </div>
    </main>
</template>

<script>
export default {
    name: 'Main',
    data() {
        return {
            errors: [],
            name:'',
            surname:'',
            email:'',
            formSending: false,
            inputBlock: false,
        };
    },
    methods: {
        addUser(){
            this.formSending = true;
            this.inputBlock = true;

            axios.post("/api/store", {
                "name" : this.name,
                "surname" : this.surname,
                "email" : this.email,
            }).then(response =>{

                if(response.data.errors){
                   this.errors = response.data.errors;
                    this.formSending = false;
                    this.inputBlock = false;
                }else{
                    this.inputBlock = true;
                    $("#thx").modal();
                }
            })

        },
        reset(){
            this.name = '';
            this.surname = '';
            this.email = '';
            this.formSending = false;
            this.inputBlock = false;
        }
    }
}
</script>

<style>

</style>