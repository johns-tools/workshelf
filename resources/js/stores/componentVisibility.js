// componentVisibility.js
import { defineStore } from 'pinia'

export const useComponentVisibilityStore = defineStore('componentVisibility', {
    state: () => ({
        showDescription: true,
        showMsToMin: false,
        showInterestRepayment: false,
        showElectricMileage: false,
        showPetrolMileage: false,
    }),
    actions: {
        resetAll() {
            this.showDescription = false
            this.showMsToMin = false
            this.showInterestRepayment = false
            this.showElectricMileage = false
            this.showPetrolMileage = false
        },
        showComponent(type) {
            this.resetAll()
            if (type === '@apis-information') this.showDescription = true
            if (type === '@data-conversion') this.showMsToMin = true
            if (type === '@data-calculation') this.showInterestRepayment = true
            if (type === '@ev-mileage') this.showElectricMileage = true
            if (type === '@petrol-mileage') this.showPetrolMileage = true
        }
    }
})
