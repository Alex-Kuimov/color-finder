<template>
    <header class="p-3 bg-dark text-white">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><span class="nav-link px-2 text-white" @click="action.openModal('about')">О проекте</span></li>
				</ul>

				<div class="text-end">
					<button type="button" class="btn btn-don">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
							<path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
						</svg>
						<span @click="action.openModal('donation')">Поддержать проект</span>
					</button>
				</div>
			</div>
		</div>
        <Modal v-model="modal.show">
            <div class="modal-mask" @click="action.closeModal()">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <span class="modal-close" @click="action.closeModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </span>
                        <div class="modal-body" v-html="modal.content">
                        </div>
                    </div>
                </div>
            </div>
        </Modal>
	</header>
</template>

<script>
import Modal from './Modal.vue';

export default {
    components: {
        Modal,
    },
    props: ['modal', 'action'],
}
</script>