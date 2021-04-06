<template>
	<AppContent>
		<div class="nodue-grid">
			<QuickNew />

			<PinnedNotes />

			<Notes />
		</div>
	</AppContent>
</template>

<script>
import AppContent from '@nextcloud/vue/dist/Components/AppContent'
import Notes from './components/Notes.vue'
import PinnedNotes from './components/PinnedNotes.vue'
import QuickNew from './components/QuickNew.vue'

export default {
	name: 'App',

	components: {
		AppContent,
		Notes,
		PinnedNotes,
		QuickNew,
	},

	data() {
		return {}
	},

	computed: {},

	async mounted() {},

	methods: {},
}
</script>

<style lang="scss" scoped>
.nodue-grid {
	display: flex;
	flex-direction: column;
	margin-top: 2em;
	padding-right: 2em;
	padding-left: 2em;
	width: 100%;
}
</style>
