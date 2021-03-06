module.exports = {
    /**
     * Helper method for making POST HTTP requests.
     */
    post(uri, form) {
        return FormHttp.sendForm('post', uri, form);
    },


    /**
     * Helper method for making PUT HTTP requests.
     */
    put(uri, form) {
        return FormHttp.sendForm('put', uri, form);
    },


    /**
     * Helper method for making PATCH HTTP requests.
     */
    patch(uri, form) {
        return FormHttp.sendForm('patch', uri, form);
    },


    /**
     * Helper method for making DELETE HTTP requests.
     */
    delete(uri, form) {
        return FormHttp.sendForm('delete', uri, form);
    },


    /**
     * Send the form to the back-end server.
     *
     * This function will clear old errors, update "busy" status, etc.
     */
    sendForm(method, uri, form) {
        return new Promise((resolve, reject) => {
            form.startProcessing();

            axios[method](uri, JSON.parse(JSON.stringify(form)))
                .then(response => {
                    form.finishProcessing();

                    resolve(response.data);
                })
                .catch(error => {
                    let errors = JSON.parse(error.request.responseText)
                    form.errors.set(errors.errors);
                    form.busy = false;

                    reject(errors.errors);
                });
        });
    }
};