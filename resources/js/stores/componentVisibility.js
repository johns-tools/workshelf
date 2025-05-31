// componentVisibility.js
import { defineStore } from 'pinia'

export const useComponentVisibilityStore = defineStore('componentVisibility', {
    state: () => ({
        showMsToMin: false,
        showInterestRepayment: false,
    }),
    actions: {
        resetAll() {
            this.showMsToMin = false
            this.showInterestRepayment = false
        },
        showComponent(type) {
            this.resetAll()
            if (type === '@data-conversion') this.showMsToMin = true
            if (type === '@data-calculation') this.showInterestRepayment = true
        }
    }
})
