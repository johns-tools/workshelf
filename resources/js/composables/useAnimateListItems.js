// Fade-in and blur-in animation from the right for list items
import { onMounted, nextTick } from 'vue';

export function useAnimateListItems() {
  onMounted(async () => {
    await nextTick();
    const items = document.querySelectorAll('.api-list-animate li');
    items.forEach((el, i) => {
      el.style.opacity = 0;
      el.style.transform = 'translateX(60px) scale(0.98)';
      el.style.filter = 'blur(8px)';
      setTimeout(() => {
        el.style.transition = 'opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1), filter 0.7s cubic-bezier(.4,0,.2,1)';
        el.style.opacity = 1;
        el.style.transform = 'translateX(0) scale(1)';
        el.style.filter = 'blur(0)';
      }, 120 * i);
    });
  });
}
