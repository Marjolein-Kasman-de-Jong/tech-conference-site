if (typeof window !== 'undefined' && window.wp && window.wp.blocks && window.wp.blocks.registerBlockType) {
    window.wp.blocks.registerBlockType('tech-conference-site/hero', {
        edit: function ({ attributes, setAttributes }) {
            const blockProps = window.wp.blockEditor.useBlockProps();
            const RichText = window.wp.blockEditor.RichText;

            return window.wp.element.createElement(
                'div',
                blockProps,
                window.wp.element.createElement(
                    RichText,
                    {
                        tagName: 'h2',
                        className: 'featured-keynote-title',
                        value: attributes.featuredKeynoteTitle,
                        allowedFormats: [],
                        placeholder: 'Keynote-titel',
                        onChange: function (value) {
                            setAttributes({
                                featuredKeynoteTitle: value
                            });
                        }
                    }
                ),
                window.wp.element.createElement(
                    RichText,
                    {
                        tagName: 'span',
                        className: 'featured-keynote-button-text',
                        value: attributes.buttonText,
                        allowedFormats: [],
                        placeholder: 'Knoptekst',
                        onChange: function (value) {
                            setAttributes({
                                buttonText: value
                            });
                        }
                    }
                )
            );
        },
        save: function () {
            return null;
        }
    });
}
