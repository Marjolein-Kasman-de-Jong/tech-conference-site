// Reveals the hero slogan character by character while preserving its final line wrapping

(() => {
    const typeSlogan = (heading) => {
        const textElement = heading.querySelector('.slogan-text');
        const cursor = heading.querySelector('.slogan-cursor');

        if (!textElement || !cursor) {
            return;
        }

        const text = textElement.textContent;
        const prefersReducedMotion = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

        if (!text || prefersReducedMotion) {
            heading.classList.add('is-complete');
            return;
        }

        const splitIntoCharacters = (value) => (
            typeof Intl.Segmenter === 'function'
                ? [...new Intl.Segmenter(undefined, { granularity: 'grapheme' }).segment(value)]
                    .map(({ segment }) => segment)
                : Array.from(value)
        );

        const characterElements = [];

        textElement.textContent = '';

        text.split(/(\s+)/u).filter(Boolean).forEach((part) => {
            if (/^\s+$/u.test(part)) {
                textElement.append(document.createTextNode(part));
                return;
            }

            const wordElement = document.createElement('span');
            wordElement.className = 'slogan-word';

            splitIntoCharacters(part).forEach((character) => {
                const characterElement = document.createElement('span');
                characterElement.className = 'slogan-character';
                characterElement.textContent = character;
                wordElement.append(characterElement);
                characterElements.push(characterElement);
            });

            textElement.append(wordElement);
        });

        textElement.prepend(cursor);
        heading.classList.add('is-typing');

        let characterIndex = 0;

        const typeNextCharacter = () => {
            const characterElement = characterElements[characterIndex];
            characterElement.classList.add('is-visible');
            characterElement.after(cursor);
            characterIndex += 1;

            if (characterIndex < characterElements.length) {
                window.setTimeout(typeNextCharacter, 70);
                return;
            }

            heading.classList.remove('is-typing');
            heading.classList.add('is-complete');
        };

        window.setTimeout(typeNextCharacter, 250);
    };

    const initSloganAnimations = () => {
        document.querySelectorAll('.hero .slogan h1').forEach(typeSlogan);
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSloganAnimations);
    } else {
        initSloganAnimations();
    }
})();