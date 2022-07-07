<template>
    <main>
        <div class="container">

            <div class="row">

                <div class="col">
                    <h1 class="text-center text-uppercase">Contact Form</h1>
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" required :class="{'is-invalid':errors.name}">

                            <p v-for="(error, index) in errors.name" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" required :class="{'is-invalid':errors.surname}" >
                            <p v-for="(error, index) in errors.surname" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" required :class="{'is-invalid':errors.email}" >
                            <p v-for="(error, index) in errors.email" :key="'error_name' + index" class="invalid-feedback">
                                {{error}}
                            </p>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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
        };
    },
}
</script>

<style>

</style>