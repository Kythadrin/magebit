var app = new Vue({
    el: '#app',
    data() {
        return {
            email: '',
            terms: false,
            visible: true,
            errors: [
                { text: "Please provide a valid e-mail address.", display: true }, 
                { text: "Email address is required.", display: true },
                { text: "You must accept the terms and conditions.", display: true },
                { text: "We are not accepting subscriptions from Colombia emails.", display: true }
            ]
        }
    },
    mounted() {
        this.$refs.email.focus();
    },
    methods: {
        isChecked() {
            this.terms == true ? this.errors[2].display = false : this.errors[2].display = true;
        },
        checkEmail() {
            if (this.email.length > 0) {
                this.errors[1].display = false;
                this.validateEmail();
            } else {
                this.errors[1].display = true;
            } 
        },
        validateEmail() {
            const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,3}$/;
            
            if (this.email.match(regex)) {
                this.errors[0].display = false;
                this.checkDomain();
            } else {
                this.errors[0].display = true;
            }
        },
        checkDomain() {
            var x = this.email.lastIndexOf('.');
            this.email.slice(x + 1) != 'co' ? this.errors[3].display = false : this.errors[3].display = true;
        }
    },
    computed: {
        canSubmit () {
            var count = 0;

            for (i = 0; i < this.errors.length; i++) {
                if (this.errors[i].display == true ) {
                    count++;
                }
            }

            if (count > 0) {
                return true
            } else {
                return false;
            }
        }
    }
})
