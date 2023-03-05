const ActionMixin = {
    methods: {
        initAction() {
            this.action = {
                getData: this.getData,
            }
        }
    }
}

export default ActionMixin;