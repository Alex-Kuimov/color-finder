const ActionMixin = {
    methods: {
        initAction() {
            this.action = {
                getData: this.getData,
                copyColor: this.copyColor,
                openModal: this.openModal,
                closeModal: this.closeModal,
            }
        }
    }
}

export default ActionMixin;