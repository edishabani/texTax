import { waitFor } from '@testing-library/dom';
import Alpine from 'alpinejs';

test('shows error message when comment is empty', async () => {
    // Setup
    document.body.innerHTML = `
        <div x-data="{ comment: '', errors: {}, addComment() { if (!this.comment) this.errors.comment = 'Comment cannot be empty'; } }">
            <form @submit.prevent="addComment">
                <textarea x-model="comment" placeholder="Add a comment"></textarea>
                <p x-show="errors.comment" x-text="errors.comment"></p>
                <button type="submit">Submit</button>
            </form>
        </div>
    `;

    Alpine.start();

    // Action
    setTimeout(() => document.querySelector('form').dispatchEvent(new Event('submit')), 0);

    // Assertion
    await waitFor(() => {
        expect(document.querySelector('p').textContent).toBe('Comment cannot be empty');
    });
});
