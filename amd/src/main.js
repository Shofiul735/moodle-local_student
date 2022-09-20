import ModalFactory from "core/modal_factory";
export const init = () => {
  ModalFactory.create({ title: "Hello" });
  alert("Hello JS!");
};
