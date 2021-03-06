<?php

namespace Tystr\ReactJsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Tyler Stroud <tyler@tylerstroud.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tystr_react_js');

        $rootNode->children()
            ->scalarNode('react_path')
                ->isRequired()
                ->info('The absolute path to the react.js library.')
            ->end()
            ->scalarNode('components_path')->isRequired()
                ->isRequired()
                ->info('The absolute path to the combined react components javascript file.')
            ->end()
            ->enumNode('render_method')
                ->values(['v8js', 'external'])
                ->defaultValue('v8js')
                ->info('The absolute path to the combined react components javascript file.')
            ->end()
            ->scalarNode('render_url')->end();

        return $treeBuilder;
    }
}
