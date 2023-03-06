const ActionMixin = {
    methods: {
        initAction() {
            this.action = {
                getData: this.getData,
                copyColor: this.copyColor,
            }
        }
    }
}

export default ActionMixin;