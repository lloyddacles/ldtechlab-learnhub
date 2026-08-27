/**
 * PHP Tutorial Website - Client-side JavaScript
 * Handles syntax highlighting and sandbox code execution
 */

document.addEventListener('DOMContentLoaded', function () {

    // === Syntax Highlighting ===
    function highlightPHP(code) {
        // Escape HTML first
        let escaped = code
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Order matters: comments first, then strings, then everything else

        // Multi-line comments /* ... */
        escaped = escaped.replace(/(\/\*[\s\S]*?\*\/)/g, '<span class="code-comment">$1</span>');

        // Single-line comments // and #
        escaped = escaped.replace(/(\/\/[^\n]*|#(?!{)[^\n]*)/g, '<span class="code-comment">$1</span>');

        // Heredoc/Nowdoc
        escaped = escaped.replace(/(&lt;&lt;&lt;['"]?\w+['"]?[\s\S]*?\w+;)/g, '<span class="code-string">$1</span>');

        // Double-quoted strings (with variable interpolation)
        escaped = escaped.replace(/("(?:[^"\\]|\\.)*")/g, '<span class="code-string">$1</span>');

        // Single-quoted strings
        escaped = escaped.replace(/('(?:[^'\\]|\\.)*')/g, '<span class="code-string">$1</span>');

        // PHP tags
        escaped = escaped.replace(/(&lt;\?php|\?&gt;)/g, '<span class="code-php-tag">$1</span>');

        // Variables
        escaped = escaped.replace(/(\$[a-zA-Z_]\w*)/g, '<span class="code-variable">$1</span>');

        // Keywords
        const keywords = [
            'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch',
            'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do',
            'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach',
            'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final',
            'finally', 'fn', 'for', 'foreach', 'function', 'global', 'goto',
            'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof',
            'interface', 'isset', 'list', 'match', 'namespace', 'new', 'or', 'print',
            'private', 'protected', 'public', 'readonly', 'require', 'require_once',
            'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use',
            'var', 'while', 'xor', 'yield', 'yield_from', 'enum'
        ];
        const kwRegex = new RegExp('\\b(' + keywords.join('|') + ')\\b', 'g');
        escaped = escaped.replace(kwRegex, function (match) {
            // Don't re-highlight inside already highlighted spans
            return '<span class="code-keyword">' + match + '</span>';
        });

        // Constants
        const constants = ['true', 'false', 'null', 'TRUE', 'FALSE', 'NULL', '__LINE__', '__FILE__', '__DIR__', '__FUNCTION__', '__CLASS__', '__TRAIT__', '__METHOD__', '__NAMESPACE__'];
        const constRegex = new RegExp('\\b(' + constants.join('|') + ')\\b', 'g');
        escaped = escaped.replace(constRegex, '<span class="code-constant">$1</span>');

        // Numbers
        escaped = escaped.replace(/\b(\d+\.?\d*)\b/g, '<span class="code-number">$1</span>');

        return escaped;
    }

    function highlightPython(code) {
        let escaped = code
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Multi-line strings (triple quotes)
        escaped = escaped.replace(/("""[\s\S]*?"""|'''[\s\S]*?''')/g, '<span class="code-string">$1</span>');

        // Comments
        escaped = escaped.replace(/(#[^\n]*)/g, '<span class="code-comment">$1</span>');

        // Strings
        escaped = escaped.replace(/(f?"(?:[^"\\]|\\.)*"|f?'(?:[^'\\]|\\.)*')/g, '<span class="code-string">$1</span>');

        // Decorators
        escaped = escaped.replace(/(@\w+)/g, '<span class="code-keyword">$1</span>');

        // Keywords
        const keywords = [
            'False', 'None', 'True', 'and', 'as', 'assert', 'async', 'await',
            'break', 'class', 'continue', 'def', 'del', 'elif', 'else', 'except',
            'finally', 'for', 'from', 'global', 'if', 'import', 'in', 'is',
            'lambda', 'nonlocal', 'not', 'or', 'pass', 'raise', 'return',
            'try', 'while', 'with', 'yield'
        ];
        const kwRegex = new RegExp('\\b(' + keywords.join('|') + ')\\b', 'g');
        escaped = escaped.replace(kwRegex, '<span class="code-keyword">$1</span>');

        // Built-in functions
        const builtins = [
            'print', 'len', 'range', 'int', 'float', 'str', 'list', 'dict',
            'set', 'tuple', 'input', 'open', 'type', 'isinstance', 'enumerate',
            'zip', 'map', 'filter', 'sorted', 'sum', 'min', 'max', 'abs',
            'round', 'format', 'super', 'property', 'staticmethod', 'classmethod'
        ];
        const biRegex = new RegExp('\\b(' + builtins.join('|') + ')\\b', 'g');
        escaped = escaped.replace(biRegex, '<span class="code-constant">$1</span>');

        // Numbers
        escaped = escaped.replace(/\b(\d+\.?\d*)\b/g, '<span class="code-number">$1</span>');

        return escaped;
    }

    function highlightJava(code) {
        let escaped = code
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Multi-line comments
        escaped = escaped.replace(/(\/\*[\s\S]*?\*\/)/g, '<span class="code-comment">$1</span>');

        // Single-line comments
        escaped = escaped.replace(/(\/\/[^\n]*)/g, '<span class="code-comment">$1</span>');

        // Strings
        escaped = escaped.replace(/("(?:[^"\\]|\\.)*")/g, '<span class="code-string">$1</span>');

        // Chars
        escaped = escaped.replace(/('(?:[^'\\]|\\.)*')/g, '<span class="code-string">$1</span>');

        // Annotations
        escaped = escaped.replace(/(@\w+)/g, '<span class="code-keyword">$1</span>');

        // Keywords
        const keywords = [
            'abstract', 'assert', 'boolean', 'break', 'byte', 'case', 'catch',
            'char', 'class', 'const', 'continue', 'default', 'do', 'double',
            'else', 'enum', 'extends', 'final', 'finally', 'float', 'for',
            'goto', 'if', 'implements', 'import', 'instanceof', 'int',
            'interface', 'long', 'native', 'new', 'package', 'private',
            'protected', 'public', 'return', 'short', 'static', 'strictfp',
            'super', 'switch', 'synchronized', 'this', 'throw', 'throws',
            'transient', 'try', 'void', 'volatile', 'while', 'var', 'record',
            'sealed', 'permits', 'yield'
        ];
        const kwRegex = new RegExp('\\b(' + keywords.join('|') + ')\\b', 'g');
        escaped = escaped.replace(kwRegex, '<span class="code-keyword">$1</span>');

        // Types
        const types = ['String', 'System', 'Scanner', 'Math', 'Integer', 'Double', 'Boolean', 'ArrayList', 'HashMap', 'Object'];
        const typeRegex = new RegExp('\\b(' + types.join('|') + ')\\b', 'g');
        escaped = escaped.replace(typeRegex, '<span class="code-constant">$1</span>');

        // Constants
        escaped = escaped.replace(/\b(true|false|null)\b/g, '<span class="code-constant">$1</span>');

        // Numbers
        escaped = escaped.replace(/\b(\d+\.?\d*[fFlL]?)\b/g, '<span class="code-number">$1</span>');

        return escaped;
    }

    // Apply highlighting to all <pre><code> blocks
    document.querySelectorAll('pre code').forEach(function (block) {
        const raw = block.textContent;
        const lang = block.getAttribute('data-lang') || 'php';
        if (lang === 'python') {
            block.innerHTML = highlightPython(raw);
        } else if (lang === 'java') {
            block.innerHTML = highlightJava(raw);
        } else {
            block.innerHTML = highlightPHP(raw);
        }
    });

    // === Sandbox Code Execution ===
    document.querySelectorAll('.sandbox').forEach(function (sandbox) {
        const textarea = sandbox.querySelector('textarea');
        const runBtn = sandbox.querySelector('.run-btn');
        const resultDiv = sandbox.querySelector('.sandbox-result');
        const outputContent = resultDiv ? resultDiv.querySelector('.output-content') : null;

        if (!textarea || !runBtn || !resultDiv) return;

        // Detect language from data-lang attribute
        const lang = textarea.getAttribute('data-lang') || 'php';
        const sandboxEndpoints = {
            'php': '/sandbox/execute.php',
            'python': '/sandbox/execute-python.php',
            'java': '/sandbox/execute-java.php'
        };
        const endpoint = sandboxEndpoints[lang] || sandboxEndpoints['php'];

        // Pre-fill with example code if provided (base64-encoded)
        const exampleCode = textarea.getAttribute('data-example');
        if (exampleCode) {
            try {
                textarea.value = atob(exampleCode);
            } catch (e) {
                textarea.value = exampleCode;
            }
        }

        runBtn.addEventListener('click', function () {
            const code = textarea.value.trim();
            if (!code) {
                resultDiv.classList.add('visible');
                outputContent.className = 'output-content output-error';
                outputContent.textContent = 'Please write some code first.';
                return;
            }

            runBtn.disabled = true;
            runBtn.textContent = 'Running...';
            resultDiv.classList.add('visible');
            outputContent.className = 'output-content';
            outputContent.textContent = 'Executing...';

            fetch(endpoint, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'code=' + encodeURIComponent(code)
            })
            .then(function (response) { return response.json(); })
            .then(function (data) {
                if (data.error) {
                    outputContent.className = 'output-content output-error';
                    outputContent.textContent = data.error;
                } else {
                    outputContent.className = 'output-content';
                    outputContent.textContent = data.output || '(No output)';
                }
            })
            .catch(function (err) {
                outputContent.className = 'output-content output-error';
                outputContent.textContent = 'Connection error: ' + err.message;
            })
            .finally(function () {
                runBtn.disabled = false;
                runBtn.textContent = 'Run Code';
            });
        });

        // Ctrl+Enter to run
        textarea.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                runBtn.click();
            }
        });
    });

});
