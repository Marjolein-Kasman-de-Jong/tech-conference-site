if (typeof window !== 'undefined' && window.wp && window.wp.blocks && window.wp.blocks.registerBlockType) {
    window.wp.blocks.registerBlockType('tech-conference-site/hero', {
        edit: function () {
            const blockProps = window.wp.blockEditor.useBlockProps();

            return window.wp.element.createElement(
                'div',
                blockProps,
                window.wp.element.createElement(
                    'div',
                    null,
                    window.wp.element.createElement('h1', null, 'Hero Block'),
                    window.wp.element.createElement('p', null, 'Slogan en featured keynote')
                )
            );
        },
        save: function () {
            return null;
        }
    });
}