<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Headers\Vulkan;

use FFI\Contracts\Headers\Version as CustomVersion;
use FFI\Contracts\Headers\Version\Comparable;
use FFI\Contracts\Headers\Version\ComparableInterface;
use FFI\Contracts\Headers\VersionInterface;

enum Version: string implements ComparableInterface
{
    use Comparable;

    // ---- Version 1.1 (2018) ----
    case V1_1_96  = '1.1.96';
    case V1_1_97  = '1.1.97';
    case V1_1_100 = '1.1.100';
    case V1_1_101 = '1.1.101';
    case V1_1_102 = '1.1.102';
    case V1_1_103 = '1.1.103';
    case V1_1_105 = '1.1.105';
    case V1_1_106 = '1.1.106';
    case V1_1_107 = '1.1.107';
    case V1_1_108 = '1.1.108';
    case V1_1_111 = '1.1.111';
    case V1_1_112 = '1.1.112';
    case V1_1_113 = '1.1.113';
    case V1_1_114 = '1.1.114';
    case V1_1_115 = '1.1.115';
    case V1_1_117 = '1.1.117';
    case V1_1_119 = '1.1.119';
    case V1_1_120 = '1.1.120';
    case V1_1_121 = '1.1.121';
    case V1_1_122 = '1.1.122';
    case V1_1_123 = '1.1.123';
    case V1_1_124 = '1.1.124';
    case V1_1_125 = '1.1.125';
    case V1_1_126 = '1.1.126';
    case V1_1_127 = '1.1.127';
    case V1_1_128 = '1.1.128';
    case V1_1_129 = '1.1.129';
    case V1_1_130 = '1.1.130';

    public const V1_1_LOWEST = self::V1_1_96;
    public const V1_1_HIGHEST = self::V1_1_130;

    // ---- Version 1.2 (2020) ----
    case V1_2_131 = '1.2.131';
    case V1_2_132 = '1.2.132';
    case V1_2_133 = '1.2.133';
    case V1_2_134 = '1.2.134';
    case V1_2_135 = '1.2.135';
    case V1_2_136 = '1.2.136';
    case V1_2_137 = '1.2.137';
    case V1_2_139 = '1.2.139';
    case V1_2_140 = '1.2.140';
    case V1_2_141 = '1.2.141';
    case V1_2_142 = '1.2.142';
    case V1_2_143 = '1.2.143';
    case V1_2_144 = '1.2.144';
    case V1_2_145 = '1.2.145';
    case V1_2_146 = '1.2.146';
    case V1_2_147 = '1.2.147';
    case V1_2_148 = '1.2.148';
    case V1_2_149 = '1.2.149';
    case V1_2_150 = '1.2.150';
    case V1_2_151 = '1.2.151';
    case V1_2_152 = '1.2.152';
    case V1_2_153 = '1.2.153';
    case V1_2_154 = '1.2.154';
    case V1_2_155 = '1.2.155';
    case V1_2_156 = '1.2.156';
    case V1_2_157 = '1.2.157';
    case V1_2_158 = '1.2.158';
    case V1_2_159 = '1.2.159';
    case V1_2_160 = '1.2.160';
    case V1_2_161 = '1.2.161';
    case V1_2_162 = '1.2.162';
    case V1_2_163 = '1.2.163';
    case V1_2_164 = '1.2.164';
    case V1_2_165 = '1.2.165';
    case V1_2_166 = '1.2.166';
    case V1_2_167 = '1.2.167';
    case V1_2_168 = '1.2.168';
    case V1_2_169 = '1.2.169';
    case V1_2_170 = '1.2.170';
    case V1_2_171 = '1.2.171';
    case V1_2_172 = '1.2.172';
    case V1_2_173 = '1.2.173';
    case V1_2_174 = '1.2.174';
    case V1_2_175 = '1.2.175';
    case V1_2_176 = '1.2.176';
    case V1_2_177 = '1.2.177';
    case V1_2_178 = '1.2.178';
    case V1_2_179 = '1.2.179';
    case V1_2_180 = '1.2.180';
    case V1_2_181 = '1.2.181';
    case V1_2_182 = '1.2.182';
    case V1_2_183 = '1.2.183';
    case V1_2_184 = '1.2.184';
    case V1_2_185 = '1.2.185';
    case V1_2_186 = '1.2.186';
    case V1_2_187 = '1.2.187';
    case V1_2_188 = '1.2.188';
    case V1_2_189 = '1.2.189';
    case V1_2_190 = '1.2.190';
    case V1_2_191 = '1.2.191';
    case V1_2_192 = '1.2.192';
    case V1_2_193 = '1.2.193';
    case V1_2_194 = '1.2.194';
    case V1_2_195 = '1.2.195';
    case V1_2_196 = '1.2.196';
    case V1_2_197 = '1.2.197';
    case V1_2_198 = '1.2.198';
    case V1_2_199 = '1.2.199';
    case V1_2_201 = '1.2.201';
    case V1_2_202 = '1.2.202';
    case V1_2_203 = '1.2.203';

    public const V1_2_LOWEST = self::V1_2_131;
    public const V1_2_HIGHEST = self::V1_2_203;

    // ---- Version 1.3 (2022) ----
    case V1_3_204 = '1.3.204';
    case V1_3_205 = '1.3.205';
    case V1_3_206 = '1.3.206';
    case V1_3_207 = '1.3.207';
    case V1_3_208 = '1.3.208';
    case V1_3_209 = '1.3.209';
    case V1_3_210 = '1.3.210';
    case V1_3_211 = '1.3.211';
    case V1_3_212 = '1.3.212';
    case V1_3_213 = '1.3.213';
    case V1_3_214 = '1.3.214';
    case V1_3_215 = '1.3.215';
    case V1_3_216 = '1.3.216';
    case V1_3_217 = '1.3.217';

    public const V1_3_LOWEST = self::V1_3_204;
    public const V1_3_HIGHEST = self::V1_3_217;

    public const V1_LOWEST = self::V1_1_96;
    public const V1_HIGHEST = self::V1_3_HIGHEST;

    public const LATEST = self::V1_HIGHEST;

    /**
     * @param non-empty-string $version
     * @return VersionInterface
     */
    public static function create(string $version): VersionInterface
    {
        /** @var array<non-empty-string, VersionInterface> $versions */
        static $versions = [];

        return self::tryFrom($version)
            ?? $versions[$version]
            ??= CustomVersion::fromString($version);
    }

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return $this->value;
    }
}
