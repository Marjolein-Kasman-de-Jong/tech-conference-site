wp.blocks.registerBlockType('tech-conference-site/hero', {
    edit: function () {
        const blockProps = wp.blockEditor.useBlockProps();
        
        return wp.element.createElement(
            'div',
            blockProps,
            wp.element.createElement(
                'div',
                null,
                wp.element.createElement('h1', null, 'Hero Block'),
                wp.element.createElement('p', null, 'Tagline en featured keynote')
            )
        );
    },
    save: function () {
        return null;
    }
});