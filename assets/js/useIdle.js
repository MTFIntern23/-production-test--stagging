import { IdleJs } from "./idle.js";
var initialDelay = 600000; //10menit
var idle = new IdleJs({
	onIdle: function () {
		idleModal.show()
	},
	// onActive: function () {
	// 	console.log("onActive");
	// },
	// onHide: function () {
	// 	console.log("onHide");
	// },
	// onShow: function () {
	// 	warningModal.show()
	// },
	idle: initialDelay,
	keepTracking: true,
	startAtIdle: false,
}).start();
