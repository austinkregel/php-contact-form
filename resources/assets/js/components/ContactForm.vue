<style scoped>
    label {
        font-size: 18px;
        text-transform: uppercase;
    }
    .has-error {
        color: #dc7c79;
    }
    .help-block {
        color: #ffa8a6;
    }
</style>

<template>
    <div>
        <div v-if="!form.successful">
            <h2 class="text-center">Contact us</h2>
            <form id="contactForm" @submit.prevent="sendMail">
                <div :class="{'has-error': form.errors.has('name'), 'form-group': true}">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" class="form-control" name="name" v-model="form.name">
                    <span class="help-block" v-show="form.errors.has('name')">
                        {{ form.errors.get('name') }}
                    </span>
                </div>

                <div :class="{'has-error': form.errors.has('email'), 'form-group': true}">
                    <label for="email">Email *</label>
                    <input type="email" data-error="Hello *" class="form-control validate" id="email" v-model="form.email" :data-error="form.errors.get('email')">

                    <span class="help-block" v-show="form.errors.has('email')">
                        {{ form.errors.get('email') }}
                    </span>
                </div>

                <div :class="{'has-error': form.errors.has('number'), 'form-group': true}">
                    <label for="number">Number</label>
                    <input type="text" class="form-control " id="number" v-model="form.number" :data-error="form.errors.get('number')">

                    <span class="help-block" v-show="form.errors.has('number')">
                        {{ form.errors.get('number') }}
                    </span>
                </div>

                <div :class="{'has-error': form.errors.has('message'), 'form-group': true}">
                    <label for="message">Message *</label>
                    <textarea id="message" class="form-control" v-model="form.message" :data-error="form.errors.get('message')"></textarea>

                    <span class="help-block" v-show="form.errors.has('message')">
                        {{ form.errors.get('message') }}
                    </span>
                </div>
                <div class="form-group">
                    <input type="submit" :class="{'btn btn-default btn-lg pull-right':true, disabled: form.busy && form.successful}">    
                </div>
            </form>
        </div>

        <div v-else>
            <p class="text-center">Thank you! We'll respond as soon as we can!</p>
        </div>
    </div>
</template>

<script type="text/babel">

    window.FormErrors = function () {
        this.errors = {};

        /**
         * Determine if the collection has any errors.
         */
        this.hasErrors = function () {
            return ! _.isEmpty(this.errors);
        };


        /**
         * Determine if the collection has errors for a given field.
         */
        this.has = function (field) {
            return _.indexOf(_.keys(this.errors), field) > -1;
        };


        /**
         * Get all of the raw errors for the collection.
         */
        this.all = function () {
            return this.errors;
        };


        /**
         * Get all of the errors for the collection in a flat array.
         */
        this.flatten = function () {
            return _.flatten(_.toArray(this.errors));
        };


        /**
         * Get the first error message for a given field.
         */
        this.get = function (field) {
            if (this.has(field)) {
                return this.errors[field][0];
            }
        };


        /**
         * Set the raw errors for the collection.
         */
        this.set = function (errors) {
            if (typeof errors === 'object') {
                this.errors = errors;
            } else {
                this.errors = {'form': ['Something went wrong. Please try again or contact customer support.']};
            }
        };


        /**
         * Remove errors from the collection.
         */
        this.forget = function (field) {
            if (typeof field === 'undefined') {
                this.errors = {};
            } else {
                Vue.delete(this.errors, field);
            }
        };
    };
    window.Form = function (data) {
        var form = this;

        $.extend(this, data);

        /**
         * Create the form error helper instance.
         */
        this.errors = new FormErrors();

        this.busy = false;
        this.successful = false;

        /**
         * Start processing the form.
         */
        this.startProcessing = function () {
            form.errors.forget();
            form.busy = true;
            form.successful = false;
        };

        /**
         * Finish processing the form.
         */
        this.finishProcessing = function () {
            form.busy = false;
            form.successful = true;
        };

        /**
         * Reset the errors and other state for the form.
         */
        this.resetStatus = function () {
            form.errors.forget();
            form.busy = false;
            form.successful = false;
        };


        /**
         * Set the errors on the form.
         */
        this.setErrors = function (errors) {
            form.busy = false;
            form.errors.set(errors);
        };
    };
    window.FormHttp = require('./http');
    
    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                    email: '',
                    number: '',
                    message: '',
                })
            }
        },
        methods: {
            sendMail() {
                this.busy = true;
                FormHttp.post('/api/contact', this.form)
                    .then((res) => {
                        $('html, body').animate({
                            scrollTop: $("#contact").offset().top
                        }, 200);
                    })
            }
        }
    }
</script>